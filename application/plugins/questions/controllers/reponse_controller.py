from application.plugins.questions import app_question
from application.plugins.questions.models.reponse_model import ReponseModel
from application.plugins.questions.models.question_model import QuestionModel
from flask import render_template, flash, request, redirect, url_for
from application.plugins.questions.forms.form_add_reponse import ReponseForm
from flask_login import login_required
from application import db

@app_question.route('/admin/reponse/add/<int:question_id>', methods=['POST', 'GET'])
@login_required
def add_reponse(question_id):
    question = QuestionModel.query.get_or_404(question_id)
    reponse = ReponseModel()
    form = ReponseForm()
    return render_template('admin/add_reponse.html', form=form,question=question)