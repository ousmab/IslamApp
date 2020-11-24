from application.plugins.questions import app_question
from application.plugins.questions.models.question_model import QuestionModel
from application.plugins.questions.models.reponse_model import ReponseModel
from application.plugins.dashboard.models.user_model import UserModel
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

'''
affiche tous les question deja valider
'''
@app_question.route('/admin/question/reponse')
@login_required
def all_question_validate():
    questions = QuestionModel.query.filter_by(is_approved=True)
    return render_template('admin/reponse_question.html',questions=questions)

'''
affichage du theme, des questions et de leurs reponse
'''
@app_question.route('/forum/theme/<int:theme_id>')
def theme_forum(theme_id):
    questions = QuestionModel.query.filter_by(theme_id=theme_id).all()
    j=0
    for question in questions:
        reponses = ReponseModel.query.filter_by(question_id=question.id).all()
        i=0
        for reponse in reponses:
            user = UserModel.query.filter_by(id=reponse.user_id).first()
            reponses[i].author = user.fullname
            i=i+1
        questions[j].reponses = reponses
        j=j+1
    return render_template('public/theme_question.html',questions=questions)
    
