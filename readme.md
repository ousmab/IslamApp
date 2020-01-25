IslamApp
========

IslamApp est une application islamique qui a pour but d'édifier les internautes sur l'islam et
enseigner aux musulmans la religion de l'islam.

* [Historique](#historique)

* [Fonctionnalités](#fonctionnalités)

* [Technologies](#technologies)

* [Architecture de l'application](#architecture-de-l-application)

* [Installer et démarrer l'application sur Windows 10 (64 bits)](installer-et-démarrer-l-application-sur-windows-10-64-bits)

* [Installer et démarrer l'application sur Ubuntu 18.04](#installer-et-démarrer-l-application-sur-ubuntu-18-04)

* [Bon à savoir](#bon-à-savoir)

* [Comment contribuer?](#comment-contribuer)

* [Git Commit Message Style Guide](#git-commit-message-style-guide)

# Historique

- La version 1.0.0 fût dévelopé en 2014 mais n'a pas connu de succès
- La version 2.0.0 fût développé en 2018 mais n'a pas été mis en production
- Ceci est la version 3.0.0

# Fonctionnalités

- Thématiques mensuelles
- Questions / Réponses
- Calendrier musulman et horaire des prières par ville
- Articles de blog, audios et vidéos
- Programmes des émissions audios visuels
- Géolocalisation (mosquées, restaurants, écoles islamiques)

# Technologies

- Python3 / Flask
- Javascript / JQuery
- SQL database
- Progressive Web Application

# Architecture de l'application

Il s'agit d'une application client - serveur en mode web service (REST API).
- Le dossier **application** contient le code source de l'application. Dans ce dossier on retrouve:
    - **local_config.py**: il contient les configurations de base de l'application
    - **plugins**: ce dossier contient les modules métiers de l'application (fichiers statiques, geolocalisation, themes, modèles, etc...)
    - **core**: il contient les scripts et autres codes utiles au fonctionnement de l'application
    - **api**: il contient toutes les api de l'application


# Installer et démarrer l'application sur **Windows 10 (64 bits)**

1. Installer Python 3.7.0: https://www.python.org/ftp/python/3.7.0/python-3.7.0-amd64.exe
Au lancement de l'installation, choisissez les options tels que définis ci dessous

![wizard install python](docs/images/install_python.jpg)

Après installation, Python37 sera présent dans le répertoire C:\Users\VotreNomUtilisateur\AppData\Local\Programs\Python\Python37

2. Une fois installer vous pouvez exécuter Python37 ou PIP37 en tapant l'une de ces commandes

    ```
    py -3.7 # pour exécuter Python37
    py -3.7 -m  pip # pour exécuter PIP37
    ```

3. Créer votre _virtualenv_ dans lequel vous allez travaillez sur le projet

    ```
    py -3.7 -m  venv \chemin\vers\votre\dossier\de\projet
    ```

4. Activer le virtualenv en tapant la commande suivante

    ```
     \chemin\vers\votre\dossier\de\projet\Scripts\activate
    ```

5. Mettre à jour pip

  ```
   python -m pip install --upgrade pip
  ```

6. Installer git si vous ne l'avez pas encore fait

    ```
    sudo apt install git
    ```

7. Cloner le dépôt du projet

    ```
    git clone https://github.com/proxima-cm/IslamApp.git
    ```

8. Installer les dépendances de l'application

    ```
    cd IslamApp
    pip install -r requirements.txt
    ```

## Comment exécuter l'application sur Windows?

1.  Activer le virtualenv si ce n'est pas encore fait

    ```
     \chemin\vers\votre\dossier\de\projet\Scripts\activate
    ```

2. Activer l'environnement de développement

    ```
    set FLASK_APP=run.py
    set FLASK_ENV=development
    ```

3. Effectuer la migration de la BD si nécessaire

    ```
    flask db init
    ```

    ou

    ```
    flask db migrate
    ```

    ou

    ```
    flask db upgrade
    ```

    Pour en savoir plus sur les commandes de migration

    ```
    flask db --help
    ```

4. On peut maintenant démarrer l'application

    ```
    python -m flask run
    ```

# Installer et démarrer l'application sur **Ubuntu 18.04**

1. Sur Ubuntu 18.04, Python 3 y est déjà installer. Pour vérifier, vous pouvez démarrer l'interpréteur Python en tapant

    ```
    python3 # vous verrez python 3.6 s'afficher
    ```

2. Maintenant, il faut définir Python3 comme votre interpréteur par défaut si ce n'est pas le cas. Pour savoir quel est votre interpréteur par défaut, tapez

    ```
    python # si python 2.6 s'affiche, alors c'est lui votre interpréteur, il faudra le changer
    ```

Pour changer votre interpréteur par défaut

    ```
    sudo update-alternatives --install /usr/bin/python python /usr/bin/python2.7 1

    sudo update-alternatives --install /usr/bin/python python /usr/bin/python3.6 2

    sudo update-alternatives --config python # puis choisir le numéro représentant la version 3
    ```

3. Mettre à jour pip

  ```
   python -m pip install --upgrade pip
  ```

4. Installer git si vous ne l'avez pas encore fait

    ```
    sudo apt install git
    ```

5. Cloner le dépôt du projet

    ```
    git clone https://github.com/proxima-cm/IslamApp.git
    ```

6. Installer les dépendances de l'application

    ```
    cd IslamApp
    pip install -r requirements.txt
    ```

## Comment exécuter l'application sur Ubuntu?

1. Activer l'environnement de développement

    ```
    export FLASK_APP=run.py
    export FLASK_ENV=development
    ```

2. Effectuer la migration de la BD si nécessaire

    ```
    flask db init
    ```

    ou

    ```
    flask db migrate
    ```

    ou

    ```
    flask db upgrade
    ```

    Pour en savoir plus sur les commandes de migration

    ```
    flask db --help
    ```

3. On peut maintenant démarrer l'application

    ```
    python -m flask run
    ```

## *Vous pouvez ouvrir IslamApp à l'adresse http://localhost:5000/*


# Bon à savoir

- La branche dev est la branche principale de développement et des tests
- La branche master est la branche de production (release)
- Le versionning sera géré suivant la gestion sémantique de version. Chaque version
sera matérialisé par 3 chiffres (x, y, z) où **x** est la version majeur de l'application,
**y** représentant la modification au niveau d'un module et **z** représentant la correction d'un bug ou une modification mineure qui ne change pas un comportement au niveau de l'application.
- Nous utilisons Travis CI comme outil d'intégration continue. Il va permettre de compiler, tester
et déployer le code source.


# Comment contribuer?

1. Vous pouvez ajouter un **issue** (fonctionnalité, correction de bug, avis, etc...)
2. Vos contributions doivent apparaître dans les **issues** avant d'être soumises
3. Les soumissions se font par **Pull request** uniquement
4. Pour contribuer au code source, veuillez cloner le dépôt puis créer une branche avec cette structure: **VotreNom_Type_Fonctionnalité**. Type peut être: **feat**, **fix**, **docs**, **style**, **refactor**, **test**, **core** comme indiqué plus bas
5. Si vous rencontrez un bug (erreur), veuillez soumettre une **issue** en précisant:
  - Le module affecté
  - La procédure effectuée pour obtenir le bug
  - Une capture d'écran de l'erreur
  - Soyez explicites

# Git Commit Message Style Guide

```
type: subject

body

footer
```

## Type
The type is contained within the title and can be one of these types:
- feat: a new feature
- fix: a bug fix
- docs: changes to documentation
- style: formatting, missing semi colons, etc; no code change
- refactor: refactoring production code
- test: adding tests, refactoring test; no production code change
- core: updating build tasks, package manager configs, etc; no production code change

### Subject
Subjects should be no greater than 50 characters, should begin with a capital letter and do not end with a period.

Use an imperative tone to describe what a commit does, rather than what it did. For example, use **change**; not changed or changes.

### Body
Not all commits are complex enough to warrant a body, therefore it is optional and only used when a commit requires a bit of explanation and context. Use the body to explain the what and why of a commit, not the how.

When writing a body, the blank line between the title and the body is required and you should limit the length of each line to no more than 72 characters.

### Footer
The footer is optional and is used to reference issue tracker IDs.
