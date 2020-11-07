# Part of IslamApp. See LICENSE file for full copyright and licensing details.
__version__ = '3.0.0'
'''
file model reponse describe database
import package datetime
'''
from datetime import datetime

# package describe database
from application import db


class ReponseModel(db.Model):
    id = db.Column(db.Integer, primary_key=True)
    content = db.Column(db.String(80), nullable=False)
    date_creation = db.Column(db.DateTime, default=datetime.utcnow)
    date_publication = db.Column(db.DateTime, nullable=True)
    is_draft = db.Column(db.Boolean, default=False)
    question_id = db.Column(db.Integer, db.ForeignKey('question_model.id'))
