Gnome application
===========================

Instalation
-------------------------

*   *git clone git@github.com:gawryluklukasz/gnome-crud.git*
*   *composer install*
*   edit DATABASE in .env file
*   php bin/console doctrine:database:create
*   php bin/console doctrine:migrations:migrate

Usefull command
-------------------------

To run application in localhost: *php -S 127.0.0.1:8000 -t public*

### Tests

Gnome application has test.
To run this test we run *./bin/phpunit*.

Authors
-------------------------

*   Łukasz Gawryluk gawryluklukasz@gmail.com
