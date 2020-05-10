# Part of IslamApp. See LICENSE file for full copyright and licensing details.

import sqlalchemy
from application.plugins.geotime import app_geotime
from flask_login import login_required
from flask import render_template, request,url_for, redirect, flash
from application.plugins.geotime.models.place_type_model import PlaceTypeModel
from application.plugins.geotime.models.place_model import PlaceModel
from application import db


@app_geotime.route('/time')
def show_date_and_time():
    """
    Cette page affiche le calendrier hégirien et les horaires des prières
    """
    return render_template('show_date_and_time.html', **locals())
