FROM python:3.6-slim-stretch
MAINTAINER Abdou Nasser <abdounasser202@gmail.com>

RUN mkdir /app
WORKDIR /app

RUN apt-get update -y && \
    apt-get install -y python3-pip

COPY requirements.txt /app/requirements.txt

RUN pip3 install -r requirements.txt

COPY . /app

EXPOSE 5000

CMD export FLASK_APP=run.py
CMD export FLASK_ENV=development
CMD flask db init
CMD flask db migrate
CMD flask db upgrade
CMD flask run