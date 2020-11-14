from datetime import datetime
from application import db


class QuestionModel(db.Model):
    id = db.Column(db.Integer, primary_key=True)
    content = db.Column(db.String(80), nullable=False)
    email = db.Column(db.String(80), nullable=False)
    sender = db.Column(db.String(80))
    date_question = db.Column(db.DateTime, default=datetime.utcnow)
    is_approved = db.Column(db.Boolean, default=False)
    is_public = db.Column(db.Boolean, default=True)
    theme_id = db.Column(db.Integer, db.ForeignKey('theme_model.id'))
