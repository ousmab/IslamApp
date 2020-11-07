from application import app
from flask import render_template, session, abort, request
from application import login_manager
from application.plugins.dashboard.models.user_model import UserModel
from application.plugins.dashboard.models.role_model import RoleModel


@login_manager.user_loader
def load_user(user_id):
    return UserModel().get_user(user_id)

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
