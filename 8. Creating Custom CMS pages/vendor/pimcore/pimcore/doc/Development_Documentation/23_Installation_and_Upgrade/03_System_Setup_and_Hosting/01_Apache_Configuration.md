# Apache Configuration 

## Virtual Hosts
Make sure you have the correct settings, specifically:

```
Allowoverride All
```
which enables `.htaccess` support. 

All the necessary rewrite rules, which are needed for Pimcore to work, are in the `.htaccess` of the install package, 
see [https://github.com/pimcore/skeleton/blob/master/web/.htaccess](https://github.com/pimcore/skeleton/blob/master/web/.htaccess). 

#### Example 
```
<VirtualHost *:80>
        ServerName PROJECT.pimcore.live
 
        RewriteEngine on
        RewriteRule "^/(.*)" "https://PROJECT.pimcore.live/$1" [R=301,L]
</VirtualHost>
  
<VirtualHost *:443>
 
        ServerName PROJECT.pimcore.live
 
        # turn off mod_deflate for PHP requests, ... this is necessary because of a bug in mod_fastcgi
        SetEnvIfNoCase Request_URI "\.(php)$" no-gzip dont-vary
 
        DocumentRoot /home/PROJECT/www/web
 
        AddHandler php7.1-fcgi .php
        Action php7.1-fcgi /php7.1-fcgi
        Alias /php7.1-fcgi /usr/lib/cgi-bin/php7.1-fcgi-PROJECT
  
        FastCgiExternalServer /usr/lib/cgi-bin/php7.1-fcgi-PROJECT -host 127.0.0.1:9001 -pass-header Authorization
        <Directory /usr/lib/cgi-bin>
                Options ExecCGI FollowSymLinks
                SetHandler fastcgi-script
                Require all granted
        </Directory>
  
        <Directory /home/PROJECT/www/web>
                Options FollowSymLinks
                AllowOverride All
                Require all granted
        </Directory>
  
        RewriteEngine On
  
        SSLEngine on
        SSLCertificateFile /etc/letsencrypt/live/PROJECT.pimcore.live/cert.pem
        SSLCertificateChainFile /etc/letsencrypt/live/PROJECT.pimcore.live/chain.pem
        SSLCertificateKeyFile /etc/letsencrypt/live/PROJECT.pimcore.live/privkey.pem 
         
        # THE FOLLOWING NEEDS TO BE THE VERY LAST REWRITE RULE IN THIS VHOST
        # this is needed to pass the auth header correctly - fastcgi environment
        RewriteRule ".*" "-" [E=HTTP_AUTHORIZATION:%{HTTP:Authorization},L]
</VirtualHost>
```
