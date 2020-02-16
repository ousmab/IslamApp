from flask_restx import Api
from flask import Blueprint

rest_api = Blueprint('api', __name__)

api_v1 = Api(rest_api, version='1.0', title='IslamApp API',
    description='An API that communicates with IslamApp instances',
)