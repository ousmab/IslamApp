from datetime import datetime, date
import schedule
import threading
import time
import functools
import pprint
from flask import render_template, flash, request, redirect, url_for, abort
from flask_login import login_required

from application import db
from application.plugins.theme import app_theme
from application.plugins.theme.models.theme_model import Theme
from application.plugins.theme.forms.form_add_theme import ThemeForm

'''
def job():
    print('maroufa' % threading.current_thread())

def run_threaded(job_func):
    job_thread = threading.Thread(target=job_func)
    job_thread.start()
'''
#schedule.every(1).minutes.do(run_threaded,job)
'''
while True:
    schedule.run_pending()
    time.sleep(1)
'''
def theme_tache_fonds():
    today_date = datetime.today()
    theme_ligne = Theme.query.filter_by(is_brouillon=False, is_archive=False).first()
    #date creation corespond a la date de publication du theme
    theme = Theme.query.filter_by(date_publi=today_date).first()
    if theme:
        theme_ligne.is_archive = True
        theme.is_brouillon = False
        db.session.commit()
    else:
        date_theme_online = theme_ligne.date_publi
        date_comparaison = today_date - date_theme_online
        number_day = date_comparaison.days
        if(number_day>30):
            theme_ligne.is_archive = True
            db.session.commit()
        else:
            pass
'''
fonction qui retourne la date du jour sous un bon forma
'''
def date_today():
    today_date = date.today()
    return datetime.combine(today_date,datetime.min.time())

def theme_process(theme,form,message_brouillon,message_theme_ligne,update):
    '''
    fonction utiliser ici poure la
    creation de theme ou la mise a jour du theme avec leurs system de validation
    '''
    nombre_theme = len(request.form['name_theme'])
    nombre_resume = len(request.form['resume_theme'])
    #variable permetant dde verifier si il ya deja un theme en ligne
    theme_ligne = Theme.query.filter_by(is_brouillon=False, is_archive=False).first()
    if  (nombre_resume < 4 or nombre_theme < 4):
            flash('Le nombre de caractere du titre ou resumée est inferieur a 4', 'danger')
    else:
        if form.is_brouillon.data:
            theme.is_brouillon = True
            date_publi = request.form['date_publication']
            datetime_str = datetime.strptime(date_publi, "%m/%d/%Y")
            theme.date_publi = datetime_str
            theme.resume = request.form['resume_theme']
            theme.titre = request.form['name_theme']
            theme.user_id = request.form['user_id']
            #variable utiliser pour eviter de mettre en brouillon deux theme la meme date
            #  si sa date de publication corespond a une deja utilser une erreur est renvoyer.
            brouillon_theme = Theme.query.filter_by(date_publi=datetime_str, \
                    is_brouillon=True).first()
            if theme_ligne:
                if(update):
                    if(datetime_str <= theme_ligne.date_publi):
                        flash('Date publication inferieur a la date du theme en ligne','danger')
                    else:
                        theme.updated_at = date_today()
                        db.session.commit()
                        flash(message_brouillon, 'success')
                        return redirect(url_for('theme.all_theme'))
                else:
                    if ((brouillon_theme) or (datetime_str <= theme_ligne.date_publi)):
                            flash('Date deja choisie ou inferieur ou egale a la date du theme en ligne, \
                         veuiller choisir une autre date ', 'danger')
                    else:
                        theme_persistence(theme)
                        flash(message_brouillon, 'success')
            else:
                flash("Veuiller mettre d'abord un theme en ligne",'danger')
        else:
            if (update):
                theme.resume = request.form['resume_theme']
                theme.titre = request.form['name_theme']
                theme.updated_at = date_today()
                db.session.commit()
                flash('Modification terminée', 'success')
            else:
                if theme_ligne:
                    flash('IL YA DEJA UN THEME EN LIGNE','danger')
                else:
                    """variable qui contient un theme brouillon qui corespont a la data
                     de creation d'un theme que le vont publier(ici on evite)
                     de publier un theme alors qu'il y'a un theme en brouillon
                     qui correspont a cette date
                    """
                    today_date = date_today()
                    theme_brouillon_today = Theme.query.filter_by(date_publi=today_date,\
                        is_brouillon=True).first()
                    if(theme_brouillon_today):
                        flash('Cette date correspont a un theme en brouillon','danger')
                    else:
                        theme.resume = request.form['resume_theme']
                        theme.titre = request.form['name_theme']
                        theme.user_id = request.form['user_id']
                        theme.date_publi = today_date
                        theme_persistence(theme)
                        flash(message_theme_ligne, 'success')

                    

def theme_persistence(theme):
    '''
    methode utiliser pour enregistrer le theme dans la base de donnee
    il prend en parametre un objet theme(le model theme)
    '''
    db.session.add(theme)
    db.session.commit()


@app_theme.route('/admin/theme/new', methods=['POST', 'GET'])
@login_required
def add_theme():
    '''
    methodes return views and add theme
    '''
    form = ThemeForm()
    theme = Theme()
    if request.method == 'POST':
        theme_process(theme,form,message_brouillon="enregistrement du brouillon reussie",message_theme_ligne="publication du theme reussie",update=False)
    return render_template('add_theme.html', form=form)

@app_theme.route('/admin/theme/all_theme')
@login_required
def all_theme():
    '''
    return return all theme and option update,delete and archive theme
    '''
    theme_ligne = Theme.query.filter_by(is_brouillon=False, is_archive=False).first()
    themes = Theme.query.filter_by(is_brouillon=True,is_archive=False)
    return render_template('all_theme.html', themes=themes,theme_ligne=theme_ligne)

@app_theme.route('/admin/theme/update/<int:theme_id>',methods=['POST','GET'])
@login_required
def update_theme(theme_id):
    '''
    update theme application
    '''
    theme = Theme.query.get_or_404(theme_id)
    form = ThemeForm()
    form.name_theme.data = theme.titre
    afficher_date = False
    form.resume_theme.data = theme.resume
    if theme.is_brouillon:
        form.is_brouillon.data = True
        form.date_publication.data = theme.date_publi.strftime('%m/%d/%Y')
        #varible utiliser pour afficher la date de publication
        afficher_date = True
    if request.method == 'POST':
        theme_process(theme,form,message_brouillon="Modification du brouillon reussie",message_theme_ligne="modification du theme en ligne reussie",update=True)
    return render_template('add_theme.html',form=form,afficher_date=afficher_date,theme=theme)

@app_theme.route('/admin/theme/delete/<int:theme_id>')
@login_required
def delete_theme(theme_id):
    '''
    delete theme application
    '''
    theme = Theme.query.get_or_404(theme_id)
    db.session.delete(theme)
    db.session.commit()
    flash('Supression du theme reussie avec success','success')
    return redirect(url_for('theme.all_theme'))
    

@app_theme.route('/admin/theme/archiver', methods=['POST', 'GET'])
@login_required
def archive_theme():
    '''
    archive theme
    '''
    theme_online = Theme.query.filter_by(is_brouillon=False, is_archive=False).first()
    form = ThemeForm()
    is_archive_name=False
    if(theme_online is None):
        abort(404)
    if request.method == 'POST':
        theme_online.is_archive = True
        db.session.commit()
        is_archive_name = True
        flash("Archivage du theme reussie avec success",'success')
    return render_template('archiver_theme.html',theme=theme_online,form=form,is_archive_name=is_archive_name)

@app_theme.route('/admin/theme/all_archive')
@login_required
def all_archive():
    '''
    return return all theme archived
    '''
    themes = Theme.query.filter_by(is_archive=True)
    return render_template('all_archive_theme.html', themes=themes)

@app_theme.route('/admin/theme/desarchiver/<int:id_theme>')
@login_required
def unarchive(id_theme):
    '''
    unarchive theme application
    '''
    theme_id = id_theme
    theme = Theme.query.get_or_404(theme_id)
    theme_ligne = Theme.query.filter_by(is_brouillon=False, is_archive=False).first()
    if theme_ligne:
        theme_ligne.is_archive = True
        theme_ligne.is_brouillon = False    
    theme.is_archive = False
    theme.is_brouillon = False
    today_date = datetime.today()
    theme.date_publi=today_date
    db.session.commit()
    flash("Mise en ligne du theme archiver terminer",'success')
    return redirect(url_for('theme.all_archive'))  

    
@app_theme.route('/admin/theme/index')
@login_required
def theme_question():
    return render_template('theme_question_index.html')


