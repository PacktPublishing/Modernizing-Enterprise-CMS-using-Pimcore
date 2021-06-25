#!/bin/bash
COMPOSER_MEMORY_LIMIT=-1 composer create-project pimcore/skeleton tmp
rm tmp/docker-compose.yml
mv tmp/.[!.]* .
mv tmp/* .
rmdir tmp

#increase the memory_limit to >= 512MB as required by pimcore-install
echo 'memory_limit = 512M' >> /usr/local/etc/php/conf.d/docker-php-memlimit.ini;
service apache2 reload

#run installer
/var/www/html/vendor/bin/pimcore-install --mysql-host-socket=db --mysql-username=pimcore --mysql-password=pimcore --mysql-database=pimcore 

# fix permission
chown -R www-data .