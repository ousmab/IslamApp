# Part of IslamApp. See LICENSE file for full copyright and licensing details.

from datetime import datetime
from application import db
from application.plugins.geotime.models.place_type_model import PlaceTypeModel


class PlaceModel(db.Model):
    """ Il s'agit des lieux: par exemple mosquée tsinga, restaurant x, etc... """

    id = db.Column(db.Integer, primary_key=True)
    name = db.Column(db.String(64), index=True, unique=True)
    description = db.Column(db.String(120))
    created_at = db.Column(db.DateTime, default=datetime.utcnow)
    updated_at = db.Column(db.DateTime)
    longitude = db.Column(db.Float)
    latitude = db.Column(db.Float)

    type_id = db.Column(db.Integer, db.ForeignKey('place_type_model.id'))

    def create(self, **kwargs):
        data = kwargs['data']
        self.name = data.get('name').lower()
        self.description = data.get('description')
        self.longitude = data.get('longitude')
        self.latitude = data.get('latitude')
        self.type_id = data.get('type_id')
        db.session.add(self)
        db.session.commit()

    def update(self, obj, **kwargs):
        data = kwargs['data']
        obj.name = data.get('name').lower()
        obj.description = data.get('description')
        obj.longitude = data.get('longitude')
        obj.latitude = data.get('latitude')
        obj.updated_at = datetime.utcnow()
        db.session.flush()
        db.session.commit()

    def get_place_type_by_id(self, id):
        place_type = PlaceTypeModel.query.filter_by(id=id).first()
        if place_type:
            return place_type.name.capitalize()
        else:
            return ''
