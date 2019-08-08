# Part of IslamApp. See LICENSE file for full copyright and licensing details.


import hashlib
import random
from flask import session
from itsdangerous import URLSafeSerializer

secret_key = "jk%m&l9887t@h*ki"
serializer = URLSafeSerializer(secret_key)


def encrypt(chaine):
    """
    Crypte une chaine
    """
    return serializer.dumps(chaine)


def decrypt(chaine):
    """
    Décripte la chaine qui a été criptée
    """
    return serializer.loads(chaine)


def random_token():
    """
    Retourne un token de 16 caractères parmi ceux présents dans «elements».
    """
    elements = ["1", "3", "4211531813", "?", "F", "@", "+", "ab23cd#$",
    "f.", "d", "3629397455", "0", "O", "TytxzQ", "*", "A", "cx", "v", "des",
    "FvvT3MGWbc"]
    element = random.sample(elements, 16)
    token = "".join(element)
    return token


def generate_token():
    """
    Cré un «_csrf_token» qui sera enroyé dans le formulaire et
    retourné à chaque session.
    """
    if "_csrf_token" not in session:
        session["_csrf_token"] = random_token()
    return session["_csrf_token"]
