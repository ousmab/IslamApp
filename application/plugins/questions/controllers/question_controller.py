from application.plugins.questions import app_question
from application.plugins.questions.models.question_model import QuestionModel

@app_question.route('/questions/')
def all_questions():
    return 'dddd'