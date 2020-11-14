from application.plugins.questions import app_question
from application.plugins.questions.models.question_model import QuestionModel
from flask import render_template, flash, request, redirect, url_for, abort
from application.plugins.theme.models.theme_model import Theme

'''
controlleur pour afficher les questions en cour de validation
'''
@app_question.route('/admin/question/all_question')
def all_questions():
    theme_online = Theme.query.filter_by(is_brouillon=False, is_archive=False).first()
    question_no_validate = QuestionModel.query.filter_by(is_approved=False, theme_id= theme_online.id)
    return render_template('admin/all_question.html',questions=question_no_validate)