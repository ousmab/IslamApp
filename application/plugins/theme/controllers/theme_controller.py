# Part of IslamApp. See LICENSE file for full copyright and licensing details.
'''
import des modules
'''
#module for import package datetime and methods flask
from datetime import datetime
from flask import render_template, flash, request

__version__ = '3.0.0'

#import variable app_theme of the blueprint
from application import db
from application.plugins.theme import app_theme
from application.plugins.theme.models.theme import Theme
from application.plugins.theme.forms.form_add_theme import ThemeForm

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
    if request.method == 'POST':
        nombre_theme = len(request.form['name_theme'])
        nombre_resume = len(request.form['resume_theme'])
        if  (nombre_resume < 4 or nombre_theme < 4):
            flash('Le nombre de caractere du titre ou resumée est inferieur a 4', 'danger') 
        else:
            theme = Theme()
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
                if brouillon_theme:
                    flash('Pour cette date il ya deja un theme en brouillon, \
                         veuiller choisir une autre date ', 'danger')
                else:
                    theme_persistence(theme)
                    flash('Creation de brouillon reussie avec success', 'success')
            else:
                #variable permetant dde verifier si il ya deja un theme en ligne
                theme_ligne = Theme.query.filter_by(is_brouillon=False, is_archive=False).first()
                if theme_ligne:
                    flash('IL YA DEJA UN THEME EN LIGNE', 'danger')
                else:
                    theme.resume = request.form['resume_theme']
                    theme.titre = request.form['name_theme']
                    theme_persistence(theme)
                    flash('Publication de theme reussie avec success', 'success')
    return render_template('add_theme.html', form=form)
