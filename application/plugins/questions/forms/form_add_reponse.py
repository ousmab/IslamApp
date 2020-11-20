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


class ReponseForm(FlaskForm):
    '''
   class describe field add new theme
    '''
    response_question = TextAreaField('Reponse', validators=[DataRequired(), Length(min=4, max=400)])
    submit = SubmitField('Enregistrer')
