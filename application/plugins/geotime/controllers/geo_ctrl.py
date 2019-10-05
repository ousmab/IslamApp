# Part of IslamApp. See LICENSE file for full copyright and licensing details.

from application.plugins.geotime import app_geotime
from flask_login import login_required
from flask import render_template, request,url_for, redirect

@app_geotime.route('/coordinates')
def list_coordinates():
    coordinates = []
    return render_template('list_coordinates.html', **locals())
