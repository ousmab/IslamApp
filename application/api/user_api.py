# Part of IslamApp. See LICENSE file for full copyright and licensing details.

from . import rest_api, api_v1
from flask import request
from flask_restx import Resource, fields
from application.plugins.dashboard.models.user_model import UserModel


endpoint = api_v1.namespace('users', description='Users operations')

user_obj = api_v1.model('UserApiModel', {
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
        print(request.json)
        return user_entity.create(request.json)

@endpoint.route('/user-service/<int:id>')
@endpoint.response(404, 'User not found')
@endpoint.param('id', 'The user ID')
class UserDetailApi(Resource):

    @endpoint.marshal_with(user_obj)
    def get(self, id):
        """ return a specific user """
        return user_entity.get_user(id)

    @endpoint.doc(responses={204: 'User deleted'})
    def delete(self, id):
        """ delete a specific user """
        return user_entity.delete(id)

    @endpoint.expect(user_obj)
    @endpoint.marshal_with(user_obj)
    def put(self, id, **kwargs):
        """ update a specific user """
        return user_entity.update(id, kwargs)
