# Part of IslamApp. See LICENSE file for full copyright and licensing details.

from application.plugins.geotime import app_geotime
from flask_login import login_required
from flask import render_template, request,url_for, redirect
from application.plugins.geotime.models.place_type_model import PlaceTypeModel
from application.plugins.geotime.models.place_model import PlaceModel
from application.plugins.geotime.models.point_model import PointModel

@app_geotime.route('/coordinates')
def list_coordinates():
    coordinates = []
    return render_template('list_coordinates.html', **locals())

@app_geotime.route('/register', methods=["GET", "POST"])
def coordinates_register():
    pass
