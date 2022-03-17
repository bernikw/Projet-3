# Projet-3
[![Codacy Badge](https://app.codacy.com/project/badge/Grade/a389e058349d4ec688e25ec6c9658b21)](https://www.codacy.com/gh/bernikw/Projet-3/dashboard?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=bernikw/Projet-3&amp;utm_campaign=Badge_Grade)


Blog professionnel qui vise à présenter mes compétences en php dans le cadre d'une formation OpenClassroom.
Auteur
•	Github: bernikw

Configuration:

Ce site a été réalisé sous PHP 8.0.13, Twig 3, Bootstrap 5, Composer.

Installation:

•	Etape 1 : Clooner le repository dans le dossier racine de votre serveur.

•   Etape 2: Lancer la commande "composer install" à la racine du projet

•	Etape 3 : Créer une base données MySQL. Il est possible d'importer les fichiers de démonstration proposé

•	Etape 4: Dans le fichier src/SERVICE/Router.php, modifier les paramètres de connexion  $this->database = new Database('localhost', 'myblog','root','').

Administration du site:

Pour se connecter vous avez deux types de profils différents :


•	MEMBER (membre) : ils sont autorisés à laisser des commentaires qui doivent être validés avant d'être affichés compte Member. Access adress mail: membre@gmail.com, mot de passe: Membre20@

•	ADMIN (administrateur) : ils peuvent modifier le contenu de la page d'accueil du site, écrire et modifier des articles, gérer les utilisateurs et les commentaires. Access adress mail: admin@gmail.com mot de passe: Administrateur20@

N'importe quel membre peut devenir administrateur si celui qui a le rôle administrateur va lui accorder les droits adéquats en changant le rôle.