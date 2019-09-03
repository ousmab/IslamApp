# Part of IslamApp. See LICENSE file for full copyright and licensing details.


from application.plugins.dashboard import app_dashboard
from flask_login import login_required
from flask import render_template

@app_dashboard.route('/')
@login_required
def dash_home():
    return render_template('dash_home.html')


@app_dashboard.route('/user/profile')
@login_required
def user_profile():
    return render_template('user/profile.html')
