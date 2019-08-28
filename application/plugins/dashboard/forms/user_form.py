# Part of IslamApp. See LICENSE file for full copyright and licensing details.

from datetime import datetime
from flask_wtf import FlaskForm
from wtforms.fields import IntegerField, BooleanField, StringField, DateTimeField

class UserForm(FlaskForm):
    fullname = StringField()
    email = StringField()
    password = StringField()
    created_at = DateTimeField(default=datetime.utcnow)
    updated_at = DateTimeField()
    active = BooleanField()
