# Part of IslamApp. See LICENSE file for full copyright and licensing details.


from application.plugins.index import app_index
from flask import render_template

@app_index.route('/login')
def login():
    return render_template('login.html')


@app_index.route('/register')
def register():
    return render_template('register.html')
