## Запуск проекта

- Проект использует стандартные средства laravel и ничего более. Поэтому достаточно изучить оф. сайт на https://laravel.com/docs/5.7

- Вам понадобиться рабочей окружение с одной из поддерживаемых СУБД. Оф список поддерживыемых Laravel СУБД - MySQL, PostgreSQL, SQLite, SQL Server.
C подключением СУБД так же можно ознакомиться в оф. документации https://laravel.com/docs/5.7/database.

- Пример настроек веб сервера nginx/apache. https://laravel.com/docs/5.7/installation#web-server-configuration

```bash
composer install
php artisan key:generate
php artisan migrate
```

### Сидеры
Для заполнения базы фейковыми данными воспользуйтесь сидерами `Users, Articles, Categories`

```bash
php artisan db:seed --class=Users
php artisan db:seed --class=Articles
php artisan db:seed --class=Categories
```