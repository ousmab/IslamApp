# Part of IslamApp. See LICENSE file for full copyright and licensing details.


import requests, json, werkzeug
from application.plugins.index import app_index
from application.plugins.dashboard.models.user_model import UserModel
from flask import render_template, request, url_for, flash, redirect

@app_index.route('/login')
def login():
    return render_template('login.html')


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
