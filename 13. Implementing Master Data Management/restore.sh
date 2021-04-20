#!/bin/bash
composer install
chown -R www-data .
bin/console assets:install --symlink public
bin/console pimcore:deployment:classes-rebuild -c
bin/console cache:clear
bin/console cache:warmup
bin/console pimcore:bundle:enable PimcoreDataHubBundle
bin/console pimcore:bundle:install PimcoreDataHubBundle
bin/console datahub:graphql:rebuild-definitions
chown -R www-data .