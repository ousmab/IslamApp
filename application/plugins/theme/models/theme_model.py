from datetime import datetime
from application import db


class Theme(db.Model):
    """
    class that describe model theme in database
    """
    __tablename__ = 'theme_model'
    id = db.Column(db.Integer, primary_key=True)
    titre = db.Column(db.String(80), nullable=False)
    resume = db.Column(db.String(100), nullable=False)
    conclusion = db.Column(db.Text, nullable=True)
    created_at = db.Column(db.DateTime, default=datetime.utcnow)
    updated_at = db.Column(db.DateTime, nullable=True)
    date_publi = db.Column(db.DateTime, nullable=False)
    is_brouillon = db.Column(db.Boolean, default=False)
    is_archive = db.Column(db.Boolean, default=False)
    user_id = db.Column(db.Integer, db.ForeignKey('user_model.id'))
    theme_question = db.relationship('QuestionModel')
