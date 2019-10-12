# Part of IslamApp. See LICENSE file for full copyright and licensing details.

#module for import package datetime and methods flask
from datetime import datetime, date

# import flask function
from flask import render_template

#module application
from application import db
from application.plugins.index import app_index
from application.plugins.theme.models.theme import Theme

def theme_en_ligne():
    '''
    method return theme online
    '''
    return Theme.query.filter_by(is_brouillon=False, is_archive=False).first()

def theme_tache_fonds():
    '''
    fonction de tache de fonds pour l'archivage d'un theme apres un mois de plucication
    verication si la date d'aujourdhui corespond a une date de publication
    '''
    today_date = date.today()
    today_date = datetime.combine(today_date,datetime.min.time())
    theme_ligne = theme_en_ligne()
    theme = Theme.query.filter_by(date_creation=today_date,is_brouillon=True).first()
    if theme:
        theme_ligne.is_archive = True
        theme.is_brouillon = False
        db.session.commit()
    else:
        if theme_ligne:
            date_theme_online = theme_ligne.date_creation
            date_comparaison = today_date - date_theme_online
            number_day = date_comparaison.days
            if(number_day>30):
                theme_ligne.is_archive = True
                db.session.commit()
       

@app_index.route('/')
def home():
    #theme_tache_fonds()
    theme_online = theme_en_ligne()
    return render_template('index.html',theme_online=theme_online)
