# Part of IslamApp. See LICENSE file for full copyright and licensing details.


import werkzeug
from application.plugins.index import app_index
from application.plugins.dashboard.models.user_model import UserModel
from flask import render_template, request, url_for, flash, redirect
from application.core.interface import user_exist
from flask_login import login_user, current_user, login_required, logout_user

@app_index.route('/login', methods=['GET', 'POST'])
def login():
    if not user_exist():
        return redirect(url_for('index.register'))
    else:
        if request.method == 'POST':
            user = UserModel.query.filter_by(
                email = request.form['email'],
                active = True
            ).first()
            try:
                if werkzeug.security.check_password_hash(user.password,
                                                        request.form['password']):
                    login_user(user)
                    this_user = current_user
                    return redirect(url_for('dashboard.dash_home'))
                else:
                    flash('Vos identifiants sont incorrects!')
                    return redirect(url_for('index.login'))
            except AttributeError:
                flash("""Vous n'êtes pas autorisés à vous connectés,
                veuillez contactez les Administrateurs de la plateforme!""")
                return redirect(url_for('index.login'))
    return render_template('login.html')


@app_index.route('/logout')
@login_required
def logout():
    logout_user()
    return redirect(url_for('index.home'))

@app_index.route('/register', methods=['GET', 'POST'])
def register():
    if request.method == 'POST':
        user = UserModel()
        try:
            if request.form['password'] == request.form['password_confirm']:
                data = {
                    'fullname': request.form['fullname'],
                    'email': request.form['email'],
                    'password': request.form['password'],
                    'cgu_accepted': request.form['cgu_accepted']
                }
                user.create(data=data)
                flash('''Votre compte a été créé avec succès''')
                return redirect(url_for('dashboard.dash_home'))
            else:
                flash('''Les mots de passe que vous avez saisis ne
                correspondent pas!''')
        except werkzeug.exceptions.BadRequestKeyError:
            flash('Veuillez accepter les conditions d\'utilisation SVP!')
            return redirect(url_for('index.register'))
    return render_template('register.html', **locals())
