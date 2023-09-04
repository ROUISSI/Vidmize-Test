#Project OWNER : Mohamed Wael ROUISSI

# Vidmizer


#Back END

## les étapes à suivre
#####1- accés au projet et installer les packages:
    a- cd back-end
    b- composer install

#####2-configuration base de donne:

    Les paramètres de la connexion à la base de donne sont stockées dans la variable DATABASE_URL qui existe dans la fichier .env.
    Exemple:
    DATABASE_URL=‘mysql://db_user:db_password@127.0.0.1:3306/db_name’
    db_user: root
    db_password: par défaut vide 
    db_name: nom de votre base par exemple 'crud_symfony'

    DATABASE_URL='mysql://root:@127.0.0.1:3306/vidmizer_database'

#####3- création base de données :

    php bin/console doctrine:database:create

#####4- Migrations: Création des tables / schémas de la base de données

    a- php bin/console d:s:u --force


#####7- Exécution du projet

    symfony server:start


#FRONT END ANGULAR

## les étapes à suivre

#### 1- changer le repertoire
    cd front-end

#### 2- install the repo with npm
    npm install

#### 3- start the server
    ng serve --o


###### amuser vous ..

