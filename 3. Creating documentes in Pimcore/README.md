# Pimcore tutorials: First setup
This folder conatains a ready to go docker compose file. Just navigate to this folder and type `docker-compose up` !

```
docker-compose up
docker-compose exec php bash restore.sh
```

This script automatically restore vendor packages, install assets and perform a cache warmup

Credential for pimcore admin are admin\pimcore.

## instruction for manual setup

- The database is contained insto db-dump folder. You can restore manually using the adminer interface (http://localhost:8080 credentia into the docker compose file).
- the vendor folder must be restored by `composer install`
- you may need to regenerate assets symlink `bin/console assets:install --symlink web`