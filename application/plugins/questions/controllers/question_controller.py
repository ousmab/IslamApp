from application.plugins.questions import app_question
from application.plugins.questions.models.question_model import QuestionModel
from flask import render_template, flash, request, redirect, url_for, abort
from application.plugins.theme.models.theme_model import Theme
from flask_login import login_required
from application import db

'''
controlleur pour afficher les questions en cour de validation
'''
@app_question.route('/admin/question/all_question')
@login_required
def all_questions():
    theme_online = Theme.query.filter_by(is_brouillon=False, is_archive=False).first()
    question_no_validate = QuestionModel.query.filter_by(is_approved=False, theme_id= theme_online.id)
    return render_template('admin/all_question.html',questions=question_no_validate)

'''
controller pour valider une question
'''
@app_question.route('/admin/question/validate/<int:question_id>')
@login_required
def validate_question(question_id):
    question = QuestionModel.query.get_or_404(question_id)
    question.is_approved = True
    db.session.commit()
    flash('Validation de la question reussi','success')
    return redirect(url_for('questions.all_questions'))

'''
controller pour suprimer une question
'''
@app_question.route('/admin/question/delete/<int:question_id>')
@login_required
def delete_question(question_id):
    question = QuestionModel.query.get_or_404(question_id)
    db.session.delete(question)
    db.session.commit()
    flash('La question a ete suprimee avec succes','success')
    return redirect(url_for('questions.all_questions'))