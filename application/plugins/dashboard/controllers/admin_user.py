# Part of IslamApp. See LICENSE file for full copyright and licensing details.


from application.plugins.dashboard import app_dashboard
from flask_login import login_required
from flask import render_template, request, url_for, redirect
from application.plugins.dashboard.models.user_model import UserModel
from application.plugins.dashboard.models.role_model import RoleModel

@app_dashboard.route('/')
@login_required
def dash_home():
    return render_template('dash_home.html')


@app_dashboard.route('/user/profile')
@login_required
def user_profile():
    users = UserModel.query.all()
    return render_template('user/profile.html', **locals())

@app_dashboard.route('/user/profile/edit/<id>', methods=['GET', 'POST'])
@login_required
def user_profile_edit(id):
    model = UserModel()
    user = UserModel.query.filter_by(id=int(id)).first()
    roles = RoleModel.query.all()
    user_role = RoleModel.query.filter_by(id=user.role_id).first()
    if request.method == 'POST':
        role_id = RoleModel.query.filter_by(name=request.form['role']).first()
        data = {
            'role_id': role_id.id,
            'fullname': request.form['fullname'],
            'email': request.form['email'],
        }
        if request.form['password']:
            data['password'] = request.form['password']
        model.update(user, data=data)
        return redirect(url_for('dashboard.user_profile_detail', id=user.id))
    return render_template('user/edit.html', **locals())

@app_dashboard.route('/user/profile/detail/<id>')
@login_required
def user_profile_detail(id):
    user = UserModel.query.filter_by(id=int(id)).first()
    user_role = RoleModel.query.filter_by(id=user.role_id).first()
    return render_template('user/detail.html', **locals())
