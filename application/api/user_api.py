# Part of IslamApp. See LICENSE file for full copyright and licensing details.

from application import app, api
from flask import request
from flask_restplus import Resource
from application.plugins.dashboard.models.user_model import UserModel


endpoint = api.namespace('users', description='Users operations')

user_obj = api.model('UserApiModel', {
    'id': fields.Integer(required=True),
    'fullname': fields.String(required=False),
    'email': fields.String(required=True),
    'password': fields.String(required=True),
    'created_at': fields.DateTime(required=False),
    'updated_at': fields.DateTime(required=False),
    'active': fields.Boolean(required=False)
})

user_entity = UserModel()

@endpoint.route('/user-service')
class UserListApi(Resource):

    def get(self):
        """ return list of all users """
        return user_entity.get_all_users()

    @endpoint.expect(user_obj)
    def post(self):
        """ create user """
        return user_entity.create(request.json)

@endpoint.route('/user-service/<int:id>')
@endpoint.response(404, 'User not found')
@endpoint.param('id', 'The user ID')
class UserDetailApi(Resource):
    pass
