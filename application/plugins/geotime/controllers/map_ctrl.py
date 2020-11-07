# Part of IslamApp. See LICENSE file for full copyright and licensing details.
from application.plugins.geotime import app_geotime
from flask import render_template

@app_geotime.route('/')
def show_map():
    return render_template('map.html', **locals())
