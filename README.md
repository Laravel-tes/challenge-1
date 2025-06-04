### Rodar a app:

```
php arisan serve
url: localhost/8000/api/
```
### Rodar o docker-cmposer

```
docker-compose up -d
```

### Rodar uma migration
```
php artisan serve migrate
php artisan serve migration
```
### Rodar teste Geral:
```
php artisan test
```
### Rodar teste Em um Controller(Task):

```
php artisan test --filter=TaskControllerTest
```