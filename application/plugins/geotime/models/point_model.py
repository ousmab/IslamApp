# Part of IslamApp. See LICENSE file for full copyright and licensing details.

from datetime import datetime
from application import db

class PointModel(db.Model):

    id = db.Column(db.Integer, primary_key=True)
    longitude = db.Column(db.Float)
    latitude = db.Column(db.Float)
    created_at = db.Column(db.DateTime, default=datetime.utcnow)
    updated_at = db.Column(db.DateTime)

    place_id = db.Column(db.Integer, db.ForeignKey('place_model.id'),
        nullable=False)

    def create(self, **kwargs):
        data = kwargs['data']
        self.longitude = data.get('longitude').lower()
        self.latitude = data.get('latitude')
        db.session.add(self)
        db.session.commit()

    def update(self, obj, **kwargs):
        data = kwargs['data']
        obj.longitude = data.get('longitude').lower()
        obj.latitude = data.get('latitude')
        obj.updated_at = datetime.utcnow
        db.session.flush()
        db.session.commit()
