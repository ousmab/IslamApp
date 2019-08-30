# Part of IslamApp. See LICENSE file for full copyright and licensing details.

__version__ = '3.0.0'


from datetime import datetime
'''
package for date
'''

from application import db
'''
package describe database
'''

class Theme(db.Model):
    '''
    class that describe model theme in database
    '''
    __tablename__ = 'themes'
    id = db.Column(db.Integer, primary_key=True)
    titre = db.Column(db.String(80), nullable=False)
    resume = db.Column(db.String(100), nullable=False)
    date_creation = db.Column(db.DateTime, default=datetime.utcnow)
    is_brouillon = db.Column(db.Boolean, default=False)
    is_archive = db.Column(db.Boolean,default=False)