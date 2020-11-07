# Part of IslamApp. See LICENSE file for full copyright and licensing details.
import sqlalchemy
from application.plugins.geotime import app_geotime
from flask_login import login_required
from flask import render_template, request,url_for, redirect, flash
from application.plugins.geotime.models.place_type_model import PlaceTypeModel
from application.plugins.geotime.models.place_model import PlaceModel
from application import db

@app_geotime.route('/coordinates')
def list_coordinates():
    coordinates = PlaceModel.query.all()
    model = PlaceModel()
    return render_template('list_coordinates.html', **locals())

@app_geotime.route('/type-list')
def list_place_type():
    place_types = PlaceTypeModel.query.all()
    return render_template('place_type_list.html', **locals())

@app_geotime.route('/register', methods=["GET", "POST"])
def coordinates_register():
    place_types = PlaceTypeModel.query.all()
    if request.method == 'POST':
        data = {
            'name': request.form['geo_place'],
            'description': request.form['geo_place'],
            'longitude': float(request.form['geo_longitude']),
            'latitude': float(request.form['geo_latitude'])
        }
        if request.form['geo_type_place'] == 'none':
            flash(u'Veuillez choisir le type du lieu: {}'.format(data['name']))
            return redirect(url_for('geotime.coordinates_register'))
        else:
            type = PlaceTypeModel.query.filter(
                PlaceTypeModel.name==request.form['geo_type_place']).one()
            data['type_id'] = type.id
            try:
                PlaceModel().create(data=data)
            except sqlalchemy.exc.IntegrityError:
                flash(u'Le lieu {} a déjà été enregistré'.format(data['name']))
                return redirect(url_for('geotime.coordinates_register'))
            return redirect(url_for('geotime.list_coordinates'))
    return render_template('coordinates_register.html', **locals())

@app_geotime.route('/type-register', methods=["GET", "POST"])
def place_type_register():
    if request.method == 'POST':
        data = {
            'name': request.form['geo_place_type_name'],
            'description': request.form['geo_place_type_desc']
        }
        try:
            PlaceTypeModel().create(data=data)
        except sqlalchemy.exc.IntegrityError:
            flash(u'Le type {} a déjà été enregistré'.format(data['name']))
            return redirect(url_for('geotime.place_type_register'))
        return redirect(url_for('geotime.list_place_type'))
    return render_template('place_type_register.html', **locals())

@app_geotime.route('/edit/coordinates/<int:id>', methods=["GET", "POST"])
def edit_coordinates(id):
    place_types = PlaceTypeModel.query.all()
    model = PlaceModel()
    coordinate = PlaceModel.query.filter_by(id=id).first()
    if request.method == 'POST':
        data = {
            'name': request.form['geo_place'],
            'description': request.form['geo_place'],
            'longitude': float(request.form['geo_longitude']),
            'latitude': float(request.form['geo_latitude'])
        }
        model.update(coordinate, data=data)
        return redirect(url_for('geotime.list_coordinates'))
    return render_template('edit_coordinate.html', **locals())

@app_geotime.route('/delete/coordinates/<int:id>')
def delete_coordinates(id):
    place = PlaceModel.query.filter_by(id=id).first()
    db.session.delete(place)
    db.session.commit()
    return redirect(url_for('geotime.list_coordinates'))
