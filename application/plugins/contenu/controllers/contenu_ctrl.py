# Part of IslamApp. See LICENSE file for full copyright and licensing details.


from application.plugins.contenu import contenu
from flask import render_template
from flask_login import login_required

@contenu.route('/contents')
@login_required
def contenu_home():
    return render_template('contenu_index.html')

@contenu.route("/new_post")
@login_required
def contenu_create():
	return render_template("contenu_create.html")
