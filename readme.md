
    Clone the project from Github
    Go in the project folder
    Open with your code editor
    Run composer install to install PHP dependencies
    Run yarn install to install JS dependencies
    Copy the .env file and fill all informations (Database, Symfony/Mailer, Open Route Service, Pole Emploi Variable)
    Run symfony console doctrine:database:create to create database
    Run symfony console doctrine:migration:migrate to create structure of database
    Run symfony console doctrine:fixtures:load to load the fixtures in database
    Run yarn encore dev to build assets
    Run symfony server:start to launch symfony server
    Go to localhost:8000 on your browser



admin access : 
    /admin

    username : Tens
    password : 123456789

    