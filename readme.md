Для запуска:
1) запускаем `vagrant up`
2) в hosts прописывам `192.168.10.10 laravel.loc`
3) заходим в vagrant машину `vagrant ssh`
4) переходим в папку с проектом `cd code`
5) запускаем миграции `php artisan migrate`
4) выполняем `php artisan passport:install`
6) запускаем сидирование `php artisan db:seed`
7) в папке ./app/Http/Controllers/V1/http - есть все вызовы api (только для авторизованных пользователей не забываем в заголовок устанавливать свой токен accessToken)

