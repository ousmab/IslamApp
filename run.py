# Part of IslamApp. See LICENSE file for full copyright and licensing details.

from application import app
from flask import render_template, session, abort, request

@app.errorhandler(404)
def page_not_found(e):
    return render_template('404.html'), 404

@app.before_request
def anti_csrf():
    """
    Protection de la vulnérabilité CSRF.
    Vérifie que le «token» est enregistré dans la session sinon renvoie une
    erreur 403.
    """
    if request.method == "POST":
        token = session.pop("_csrf_token", None)
        if not token or token != request.form.get("_csrf_token"):
            abort(403)
