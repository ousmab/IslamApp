# Part of IslamApp. See LICENSE file for full copyright and licensing details.


from application.plugins.theme import app_theme
from flask import render_template

@app_theme.route('/admin/theme/new')
def addTheme():
    return render_template('add_theme.html')
