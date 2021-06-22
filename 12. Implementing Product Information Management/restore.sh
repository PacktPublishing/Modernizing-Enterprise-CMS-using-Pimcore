#!/bin/bash
composer install
chown -R www-data .
bin/console assets:install --symlink web
bin/console pimcore:deployment:classes-rebuild -c
bin/console pimcore:deployment:custom-layouts-rebuild -c
bin/console cache:clear
bin/console cache:warmup
chown -R www-data .