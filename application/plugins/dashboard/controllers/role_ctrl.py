# Part of IslamApp. See LICENSE file for full copyright and licensing details.


from application.plugins.dashboard import app_dashboard
from flask_login import login_required
from flask import render_template
from application.plugins.dashboard.models.role_model import RoleModel


@app_dashboard.route('/roles')
@login_required
def roles_view():
    roles = RoleModel.query.all()
    return render_template('role/roles.html', **locals())

@app_dashboard.route('/role/create')
@login_required
def role_create():
    return render_template('role/create.html')

@app_dashboard.route('/roles/edit/<id>')
@login_required
def role_edit(id):
    role = RoleModel.query.filter_by(id=int(id)).first()
    return render_template('role/edit.html', **locals())

@app_dashboard.route('/role/detail/<id>')
@login_required
def role_detail(id):
    role = RoleModel.query.filter_by(id=int(id)).first()
    return render_template('role/detail.html', **locals())
