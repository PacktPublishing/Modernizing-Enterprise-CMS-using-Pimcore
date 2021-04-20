#!/bin/bash
 mv app _app
 mv src _src
 mv web _web

 cp -r ../2.\ Setting\ up\ Pimcore\ Development\ Environment/config config
 cp -r ../2.\ Setting\ up\ Pimcore\ Development\ Environment/src src
 cp -r ../2.\ Setting\ up\ Pimcore\ Development\ Environment/templates templates
 cp -r ../2.\ Setting\ up\ Pimcore\ Development\ Environment/translations translations
 rm var/config
 cp -r ../2.\ Setting\ up\ Pimcore\ Development\ Environment/var/config var/config

 rm -rf var/cache

cp  ../2.\ Setting\ up\ Pimcore\ Development\ Environment/composer.json composer.json
cp  ../2.\ Setting\ up\ Pimcore\ Development\ Environment/.env .env
cp -r ../2.\ Setting\ up\ Pimcore\ Development\ Environment/public public

# composer update
# dont work for sql erros
 bin/console doctrine:migrations:migrate

#error  /var/www/html/var/config/robots.php doesn't exist
echo "<?php return array();" > var/config/robots.php

chown -R www-data .

bin/console cache:clear

# move resources
cp -r _app/Resources/views/* templates

#cp -r app/Resources/config/* config

cp -r _web/var/* public/var

echo "namespace changed from AppBundle to App, if you see error like The controller for URI '/' is not callable: Controller "xxx" does neither exist as service nor as class. please login and change it manually"

echo "merge manually routes"

cp -r _src/AppBundle/Controller/* src/Controller
cp -r _src/AppBundle/Command/* src/Command
mkdir src/EventListener
cp -r _src/AppBundle/EventListener/* src/EventListener
cp -r _src/AppBundle/Model/* src/Model


sed -i 's/AppBundle/App/g' src/Controller/*
sed -i 's/AppBundle/App/g' src/Command/*
sed -i 's/AppBundle/App/g' src/EventListener/*
sed -i 's/AppBundle/App/g' src/Model/*

sed -i 's/AppBundle/App/g' src/CalculatedValue/*
sed -i 's/AppBundle/App/g' src/Model/*