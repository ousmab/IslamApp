# Part of IslamApp. See LICENSE file for full copyright and licensing details.
'''
import des modules
'''
#module for import package flask_wtf
from flask_wtf import FlaskForm

__version__ = '3.0.0'


# import field form wtf

from wtforms import StringField, TextAreaField, SubmitField, BooleanField

#import validation for form theme
from wtforms.validators import DataRequired, Length, ValidationError

#import models
from application.plugins.theme.models.theme_model import Theme


class ThemeForm(FlaskForm):
    '''
   class describe field add new theme
    '''
    name_theme = StringField('nametheme', validators=[DataRequired(), Length(min=4, max=200)])
    resume_theme = TextAreaField('resume', validators=[DataRequired(), Length(min=4, max=400)])
    date_publication = StringField('datetheme')
    is_brouillon = BooleanField('brouillon')
    submit = SubmitField('Enregistrer')
