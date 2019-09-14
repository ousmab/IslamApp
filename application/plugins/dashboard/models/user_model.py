# Part of IslamApp. See LICENSE file for full copyright and licensing details.

from datetime import datetime
from flask_login import UserMixin
from application import db
from werkzeug.security import generate_password_hash

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
    cgu_accepted = db.Column(db.Boolean) # cgu = conditions generales d'utilisation

    role_id = db.Column(db.Integer, db.ForeignKey('role_model.id'))

    def create(self, **kwargs):
        data = kwargs['data']
        self.fullname = data.get('fullname')
        self.email = data.get('email')
        self.password = generate_password_hash(data.get('password'))
        self.cgu_accepted = True
        if len(self.query.all()) == 0:
            self.active = True
        db.session.add(self)
        db.session.commit()

    def update(self, obj, **kwargs):
        data = kwargs['data']
        obj.fullname = data.get('fullname')
        obj.email = data.get('email')
        obj.role_id = data.get('role_id')
        if data.get('password'):
            obj.password = generate_password_hash(data.get('password'))
        db.session.flush()
        db.session.commit()

    def activate(self, id):
        user = self.query.filter_by(id=id).first()
        user.active = True
        db.session.flush()
        db.session.commit()

    def deactivate(self, id):
        user = self.query.filter_by(id=id).first()
        user.active = False
        db.session.flush()
        db.session.commit()

    def get_all_users(self):
        return self.query.all()

    def get_user(self, user_id):
        return self.query.filter_by(id = user_id).first()

    def reset_password(self, id, new_password):
        pass
