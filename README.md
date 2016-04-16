# SqlCommandsBundle

This is Symfony framework's bundle, which defines useful commands for
SQL. Idea was inpired by Drupal's Drush commands.

Right now, there is only one command defined, we plan to add other
commands to this bundle and publish.

### Commands:
    php bin/console db:sqlc
    
Generates and runs mysql command to connect to database using
parameters, defined in `parameters.yml`. 


### Usage:
It's very easy to use this bundle. Just add it to your composer.json and
enable in your `AppKernel.php` file.

