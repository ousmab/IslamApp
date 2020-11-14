"""
Default Local Configuration
"""

APP_TITLE = 'IslamAPP'

PAGE_MENUS = [
    dict(
        name = 'Page One',
        url = "/"
    ),

    dict(
        name = 'Page Two',
        url = "/"
    )
]

COPYRIGHT = dict(
    name = 'IslamApp Contributors',
    url = "/"
)

FOOTER_LINKS = [
    dict(
        name = "Conditions d'utilisations",
        url = '/cgu'
    ),
    dict(
        name = U'Politique de confidentialité',
        url = '/privacy'
    ),
    dict(
        name = 'Flux RSS',
        url = '/recent.atom'
    )
]

MODULES = [

    # api
    {'path': 'application.api.user_api', 'blueprint': 'rest_api', 'url':'/api/v1'},

    # index
    {'path': 'application.plugins.index.controllers.index', 'blueprint': 'app_index', 'url':None},
    {'path': 'application.plugins.index.controllers.connexion', 'blueprint': 'app_index', 'url':None},

    # theme module
    {'path': 'application.plugins.theme.controllers.theme_controller', 'blueprint': 'app_theme', 'url':None},

    # questions module
    {'path': 'application.plugins.questions.controllers.question_controller', 'blueprint': 'app_question', 'url':None},
    {'path': 'application.plugins.questions.controllers.reponse_controller', 'blueprint': 'app_question', 'url':None},

    # dashboard module
    {'path': 'application.plugins.dashboard.controllers.admin_user', 'blueprint': 'app_dashboard', 'url':'/admin'},
    {'path': 'application.plugins.dashboard.controllers.role_ctrl', 'blueprint': 'app_dashboard', 'url':'/admin'},

    # geotime module
    {'path': 'application.plugins.geotime.controllers.geo_ctrl', 'blueprint': 'app_geotime', 'url':'/geo'},
    {'path': 'application.plugins.geotime.controllers.map_ctrl', 'blueprint': 'app_geotime', 'url':'/map'},

    #contenu module
    {'path': 'application.plugins.contenu.controllers.contenu_ctrl', 'blueprint': 'contenu', 'url':'/admin'},
]


MODULE_MENUS = [
    # html files for menus
]
