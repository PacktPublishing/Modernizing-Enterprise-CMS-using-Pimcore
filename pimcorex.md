# Changes

### docker-compose.yml

image: pimcore/pimcore:PHP8.0-apache


my-project/web => my-project/public 


environment:
     - APACHE_DOCUMENT_ROOT=/var/www/html/public


replace composer.json
remove compose.lock
rm -rf vendor/

rm -rf var/cache

ensure env file

move src/AppBundle
replace Kernel.php

move Resource/config => config

 composer update -W

composer require symfony/maker-bundle --dev


robots.php