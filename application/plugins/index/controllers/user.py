# Part of IslamApp. See LICENSE file for full copyright and licensing details.


import requests, json
from application.plugins.index import app_index
from flask import render_template, request, url_for

@app_index.route('/login')
def login():
    return render_template('login.html')


@app_index.route('/register', methods=['GET', 'POST'])
def register():
    if request.method == 'POST':
        data = {
            'fullname': request.form['fullname'],
            'email': request.form['email'],
            'password': request.form['password'],
            'cgu_accepted': True
        }
        r = requests.post(url_for('api.root', _external=True), json=json.dumps(data))
        # if r.status_code != 200:
        #     raise Exception('Error')
    return render_template('register.html', **locals())
