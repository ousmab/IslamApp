# Part of IslamApp. See LICENSE file for full copyright and licensing details.

__version__ = '3.0.0'

import importlib

from flask import Flask
from flask_sqlalchemy import SQLAlchemy
from flask_migrate import Migrate
from flask_login import LoginManager
from application.env import DATABASE_URI
from application.core.tools import date_time, security


class FlaskApp(Flask):
    pass


app = FlaskApp(__name__, static_folder='core/static',
    template_folder='core/templates')

# ==============
# CONFIGURATIONS
# ==============
try:
    app.secret_key = security.secret_key
    app.config.from_pyfile('local_config.py')
except IOError:
    raise IOError('No configuration setup: local_config.py not found!')

app.jinja_env.globals["csrf_token"] = security.generate_token
app.jinja_env.filters["format_date_time"] = date_time.format_date

# Configure database
app.config['SQLALCHEMY_TRACK_MODIFICATIONS'] = False
app.config['SQLALCHEMY_DATABASE_URI'] = DATABASE_URI

db = SQLAlchemy(app)
migrate = Migrate(app, db)
login_manager = LoginManager(app)
login_manager.login_view = "index.login"
login_manager.login_message = u"Veuillez-vous connecter SVP!"


# =================
# LOAD MODULES
# =================
for plugin in app.config['MODULES']:
    module = importlib.import_module(plugin['path'], package='application')
    if plugin['url']:
        app.register_blueprint(getattr(module, plugin['blueprint']),
                                url_prefix=plugin['url'])
    else:
        app.register_blueprint(getattr(module, plugin['blueprint']))