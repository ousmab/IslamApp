# Part of IslamApp. See LICENSE file for full copyright and licensing details.

__version__ = '3.0.0'

import os
import importlib

from flask import Flask
from flask_sqlalchemy import SQLAlchemy
from flask_migrate import Migrate

from application.core.tools import date_time, security

class FlaskApp(Flask):
    pass


app = FlaskApp(__name__, static_folder='core/static',
    template_folder='core/templates')

# ==============
# CONFIGURATIONS
# ==============
try:
    app.config.from_pyfile('local_config.py')
except IOError:
    raise IOError('No configuration setup: local_config.py not found!')

app.jinja_env.globals["csrf_token"] = security.generate_token
app.jinja_env.filters["format_date_time"] = date_time.format_date

# Configure database (sqlite)
project_dir = os.path.dirname(os.path.abspath(__file__))
db_file = "sqlite:///{}".format(os.path.join(project_dir, "islamapp.db"))

app.config['SQLALCHEMY_DATABASE_URI'] = db_file
db = SQLAlchemy(app)
migrate = Migrate(app, db)


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
