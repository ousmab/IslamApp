# Part of IslamApp. See LICENSE file for full copyright and licensing details.

from datetime import datetime
from application import db

class RoleModel(db.Model):

    id = db.Column(db.Integer, primary_key=True)
    name = db.Column(db.String(64), index=True, unique=True)
    description = db.Column(db.String(120))
    created_at = db.Column(db.DateTime, default=datetime.utcnow)

    def create(self, **kwargs):
        data = kwargs['data']
        self.name = data.get('name')
        self.description = data.get('description')
        db.session.add(self)
        db.session.commit()
