from application.plugins.questions import app_question
from application.plugins.questions.models.reponse_model import ReponseModel

@app_question.route('/reponses/')
def all_reponse():
    return 'ddd'