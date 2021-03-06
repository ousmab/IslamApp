# Part of IslamApp. See LICENSE file for full copyright and licensing details.


from application.plugins.dashboard import app_dashboard
from flask_login import login_required
from flask import render_template, request, redirect, url_for
from application.plugins.dashboard.models.role_model import RoleModel
from application.plugins.dashboard.models.user_model import UserModel


@app_dashboard.route('/roles')
@login_required
def roles_view():
    roles = RoleModel.query.all()
    return render_template('role/roles.html', **locals())

@app_dashboard.route('/roles/admins')
@login_required
def roles_admins_view():
    role = RoleModel.query.filter_by(name='administrateur').first()
    if role:
        users = UserModel.query.filter_by(role_id=role.id).all()
    return render_template('role/roles_admins.html', **locals())

@app_dashboard.route('/roles/oulemas')
@login_required
def roles_oulemas_view():
    role = RoleModel.query.filter_by(name='oulema').first()
    if role:
        users = UserModel.query.filter_by(role_id=role.id).all()
    return render_template('role/roles_oulemas.html', **locals())

@app_dashboard.route('/roles/redacteurs')
@login_required
def roles_redacteurs_view():
    role = RoleModel.query.filter_by(name='redacteur').first()
    if role:
        users = UserModel.query.filter_by(role_id=role.id).all()
    return render_template('role/roles_redacteurs.html', **locals())

@app_dashboard.route('/role/create', methods=['GET', 'POST'])
@login_required
def role_create():
    if request.method == 'POST':
        role = RoleModel()
        data = {
            'name': request.form['name'],
            'description': request.form['description']
        }
        role.create(data=data)
        return redirect(url_for('dashboard.roles_view'))
    return render_template('role/create.html')

@app_dashboard.route('/roles/edit/<id>', methods=['GET', 'POST'])
@login_required
def role_edit(id):
    model = RoleModel()
    role = RoleModel.query.filter_by(id=int(id)).first()
    if request.method == 'POST':
        data = dict()
        data['name'] = request.form['name']
        data['description'] = request.form['description']
        model.update(role, data=data)
        return redirect(url_for('dashboard.role_detail', id=role.id))
    return render_template('role/edit.html', **locals())

@app_dashboard.route('/role/detail/<id>')
@login_required
def role_detail(id):
    role = RoleModel.query.filter_by(id=int(id)).first()
    return render_template('role/detail.html', **locals())
