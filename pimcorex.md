# Changes

### docker-compose.yml

image: pimcore/pimcore:PHP8.0-apache


my-project/web => my-project/public 


environment:
     - APACHE_DOCUMENT_ROOT=/var/www/html/public