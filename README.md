# SqlCommandsBundle

This is Symfony framework's bundle, which defines useful commands for
SQL. Idea was inpired by Drupal's Drush commands.

Right now, there is only one command defined, we plan to add other
commands to this bundle and publish.

### Commands:
    php bin/console db:sqlc
    
Generates and runs mysql command to connect to database using
parameters, defined in `parameters.yml`. 


### Installation and Usage:
It's very simple to use this bundle. Just add it to your composer.json
and enable it in your Symfony application's `AppKernel.php` file's
`registerBundles()` function like other bundles.
    
    new \Omedia\SqlCommandsBundle\SqlCommandsBundle()

