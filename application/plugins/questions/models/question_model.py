# Part of IslamApp. See LICENSE file for full copyright and licensing details.
__version__ = '3.0.0'
'''
file model question describe database
import package datetime
'''
from datetime import datetime

#package describe database
from application import db

class Question(db.Model):
    '''
     model describe table questions
    '''
    __tablename__ = 'questions'
    id = db.Column(db.Integer, primary_key=True)
    contenu = db.Column(db.String(80), nullable=False)
    email = db.Column(db.String(80), nullable=False)
    emeteur = db.Column(db.String(80))
    date_question = db.Column(db.DateTime,default=datetime.utcnow)
    is_approuve = db.Column(db.Boolean, default=False)
    is_public = db.Column(db.Boolean, default=True)
    theme_id = db.Column(db.Integer, db.ForeignKey('theme_model.id'))