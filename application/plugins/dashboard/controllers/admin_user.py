# Part of IslamApp. See LICENSE file for full copyright and licensing details.


from application.plugins.dashboard import app_dashboard
from flask import render_template

@app_dashboard.route('/')
def dash_home():
    return render_template('dash_home.html')
