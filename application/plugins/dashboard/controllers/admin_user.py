# Part of IslamApp. See LICENSE file for full copyright and licensing details.


from application.plugins.dashboard import app_dashboard
from flask_login import login_required
from flask import render_template
from application.plugins.dashboard.models.user_model import UserModel

@app_dashboard.route('/')
@login_required
def dash_home():
    return render_template('dash_home.html')


@app_dashboard.route('/user/profile')
@login_required
def user_profile():
    users = UserModel.query.all()
    return render_template('user/profile.html', **locals())

@app_dashboard.route('/user/profile/edit/<id>')
@login_required
def user_profile_edit(id):
    user = UserModel.query.filter_by(id=int(id)).first()
    return render_template('user/edit.html', **locals())

@app_dashboard.route('/user/profile/detail/<id>')
@login_required
def user_profile_detail(id):
    user = UserModel.query.filter_by(id=int(id)).first()
    return render_template('user/detail.html', **locals())
