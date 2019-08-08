# Part of IslamApp. See LICENSE file for full copyright and licensing details.

from flask import Blueprint
app_index = Blueprint('index', __name__, template_folder='views',
                        static_folder='static')
