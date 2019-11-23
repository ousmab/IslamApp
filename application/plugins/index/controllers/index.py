# Part of IslamApp. See LICENSE file for full copyright and licensing details.


from application.plugins.index import app_index
from flask import render_template

@app_index.route('/')
def home():
    return render_template('index.html')


@app_index.route('/about')
def about():
    return render_template('about.html')

