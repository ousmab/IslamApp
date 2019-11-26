# Part of IslamApp. See LICENSE file for full copyright and licensing details.
'''
import des modules
'''
#module for import package datetime and methods flask
from datetime import datetime, date
import pprint
from flask import render_template, flash, request, redirect, url_for, abort

__version__ = '3.0.0'

#import variable app_theme of the blueprint
from application import db
from application.plugins.theme import app_theme
from application.plugins.theme.models.theme import Theme
from application.plugins.theme.forms.form_add_theme import ThemeForm

def theme_tache_fonds():
    today_date = datetime.today()
    theme_ligne = Theme.query.filter_by(is_brouillon=False, is_archive=False).first()
    theme = Theme.query.filter_by(date_creation=today_date).first()
    if theme:
        theme_ligne.is_archive = True
        theme.is_brouillon = False
        return 'publication d"un theme'
    else:
        date_theme_online = theme_ligne.date_creation
        date_comparaison = today_date - date_theme_online
        number_day = date_comparaison.days
        if(number_day>30):
            return 'plus grand que 30'
        else:
            return 'plus petit que 30'

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
            theme.date_creation = datetime_str
            theme.resume = request.form['resume_theme']
            theme.titre = request.form['name_theme']
            #variable utiliser pour eviter de mettre en brouillon deux theme la meme date
            #  si sa date de publication corespond a une deja utilser une erreur est renvoyer.
            brouillon_theme = Theme.query.filter_by(date_creation=datetime_str, \
                    is_brouillon=True).first()
            if theme_ligne:
                if(update):
                    if(datetime_str < theme_ligne.date_creation):
                        flash('Date publication inferieur a la date du theme en ligne','danger')
                    else:
                        db.session.commit()
                        flash(message_brouillon, 'success')
                        return redirect(url_for('theme.all_theme'))
                else:
                    if ((brouillon_theme) or (datetime_str < theme_ligne.date_creation)):
                            flash('Date deja choisie ou inferieur a la date du theme en ligne, \
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
                db.session.commit()
                flash('Modification zxsasa', 'success')
            else:
                if theme_ligne:
                    flash('IL YA DEJA UN THEME EN LIGNE','danger')
                else:
                    theme.resume = request.form['resume_theme']
                    theme.titre = request.form['name_theme']
                    today_date = date.today()
                    theme.date_creation = today_date
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
def all_theme():
    '''
    return return all theme and option update,delete and archive theme
    '''
    theme_ligne = Theme.query.filter_by(is_brouillon=False, is_archive=False).first()
    themes = Theme.query.filter_by(is_brouillon=True,is_archive=False)
    return render_template('all_theme.html', themes=themes,theme_ligne=theme_ligne)

@app_theme.route('/admin/theme/update/<int:theme_id>',methods=['POST','GET'])
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
        form.date_publication.data = theme.date_creation.strftime('%m/%d/%Y')
        #varible utiliser pour afficher la date de publication
        afficher_date = True
    if request.method == 'POST':
        theme_process(theme,form,message_brouillon="Modification du brouillon reussie",message_theme_ligne="modification du theme en ligne reussie",update=True)
    return render_template('add_theme.html',form=form,afficher_date=afficher_date,theme=theme)

@app_theme.route('/admin/theme/delete',methods=['POST'])
def delete_theme():
    '''
    delete theme application
    '''
    if request.method == 'POST':
        theme_id = request.form['id_theme']
        theme = Theme.query.get_or_404(theme_id)
        db.session.delete(theme)
        db.session.commit()
        flash('Supression du theme reussie avec success','success')
        return redirect(url_for('theme.all_theme'))
    else:
        return "error process"


@app_theme.route('/admin/theme/archiver', methods=['POST', 'GET'])
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
def all_archive():
    '''
    return return all theme archived
    '''
    themes = Theme.query.filter_by(is_archive=True)
    return render_template('all_archive_theme.html', themes=themes)

@app_theme.route('/admin/theme/desarchiver',methods=['POST'])
def unarchive():
    '''
    unarchive theme application
    '''
    if request.method == 'POST':
        theme_id = request.form['id_theme']
        theme = Theme.query.get_or_404(theme_id)
        theme_ligne = Theme.query.filter_by(is_brouillon=False, is_archive=False).first()
        if theme_ligne:
            theme_ligne.is_archive = True
            theme_ligne.is_brouillon = False
            
        theme.is_archive = False
        theme.is_brouillon = False
        today_date = datetime.today()
        theme.date_creation=today_date
        db.session.commit()
        flash("Mise en ligne du theme archiver terminer",'success')
        return redirect(url_for('theme.all_archive'))  


