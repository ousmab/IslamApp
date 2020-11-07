FROM python:alpine3.6
MAINTAINER Abdou Nasser <abdounasser202@gmail.com>
RUN apk update && apk add postgresql-dev gcc python3-dev musl-dev
COPY requirements.txt /app/requirements.txt
WORKDIR /app
RUN pip install --upgrade pip
RUN pip install -r requirements.txt
COPY . /app
WORKDIR /app