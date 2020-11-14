# Pimcore tutorials: First setup
This folder conatains a ready to go docker compose file. Just navigate to this folder and type `docker-compose up` !

```
docker-compose up
docker-compose exec php bash install.sh
```
The script `insall.sh` will automatically do the setup process that consists in following steps:

```
# Create a Pimcore project starting for the empty template into a temporary folder
COMPOSER_MEMORY_LIMIT=-1 composer create-project pimcore/skeleton tmp

# some tricks for moving the content inside ./tmp to ./ that's the folder where apache listen
mv tmp/.[!.]* .
mv tmp/* .
rmdir tmp

#increase the memory_limit to >= 512MB as required by pimcore-install
echo 'memory_limit = 512M' >> /usr/local/etc/php/conf.d/docker-php-memlimit.ini;
service apache2 reload

#run installer. The database connection is hardcoded, so you wil be prompted only for entering admin credential
./vendor/bin/pimcore-install --mysql-host-socket=db --mysql-username=pimcore --mysql-password=pimcore --mysql-database=pimcore 

# fix permission
chown -R www-data .
```