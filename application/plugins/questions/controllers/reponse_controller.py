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
    if request.method == 'POST':
        number_caractere = len(request.form['response_question'])
        #variable pour verifier si le predicateur a deja repondu a une question
        #reponse_ishave = ReponseModel.query.filter_by(question_id=question_id,user_id=request.form['user_id'])
        if (number_caractere < 4) :
            flash('Le nombre de caractere pour une reposne est moins de 10','danger')
        else:
            reponse.content = request.form['response_question']
            reponse.question_id = question_id
            reponse.user_id = request.form['user_id']
            db.session.add(reponse)
            db.session.commit()
            flash('Question repondue avec success','success')
            return redirect(url_for('questions.all_question_validate'))
    return render_template('admin/add_reponse.html', form=form,question=question)