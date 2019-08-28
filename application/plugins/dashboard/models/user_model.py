# Part of IslamApp. See LICENSE file for full copyright and licensing details.

from datetime import datetime
from flask_login import UserMixin
from application import db

class UserModel(UserMixin, db.Model):
    """This class is the user entity. It inherit from UserMixin so it can
    contain default implementations for the methods that Flask-Login expects
    user objects to have."""

    id = db.Column(db.Integer, primary_key=True)
    fullname = db.Column(db.String(64), index=True, unique=True)
    email = db.Column(db.String(120), index=True, unique=True)
    password = db.Column(db.String(128))
    created_at = db.Column(db.DateTime, default=datetime.utcnow)
    updated_at = db.Column(db.DateTime)
    active = db.Column(db.Boolean)

    def create(self, **kwargs):
        pass

    def update(self, id, **kwargs):
        pass

    def update_password(self, id, new_password):
        pass

    def delete(self, id):
        pass

    def activate(self, id):
        pass

    def deactivate(self, id):
        pass

    def get_all_users(self):
        pass

    def get_user(self, id):
        pass
