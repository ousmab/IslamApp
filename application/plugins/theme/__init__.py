# Part of IslamApp. See LICENSE file for full copyright and licensing details.

from flask import Blueprint
app_theme = Blueprint('theme', __name__, template_folder='views',
                        static_folder='assets')
