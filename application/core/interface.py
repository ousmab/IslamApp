# Part of IslamApp. See LICENSE file for full copyright and licensing details.


from application.plugins.dashboard.models.user_model import UserModel

def user_exist():
    if len(UserModel.query.all()) == 0:
        return False
    else:
        return True
