<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

##### Задача

> Создание модуля мультирегиональности на подпапках и демонстрация его работы. Работа должна представлять из себя
> готовый проект, на главной странице которого будет список городов. каждый должен иметь свою ссылку. Например: Казань –
> site.com/kazan; Москва – site.com/msk и так далее. При клике на город должна открываться ссылка. Появляться тот же
> список городов, но выбранный город должен быть выделен жирным. При этом при переходе на основной домен, если мы уже
> выбрали город – нас должно редиректить на подпапку с городом. К примеру: выбрали город Москва, при переходе на основной
> домен site.com, должен происходить 301-ый редирект site.com/moscow. Также если мы перешли на подпапку другого города
> сразу из адресной строки – город должен автоматически запоминаться. Например, если мы сразу в адресной строке вбили
> site.com/kazan – город Казань сразу запоминается, не имеет значения, был ли у нас изначально другой город сохранен.

##### Дополнительно

>Реализовать api методами на удаление и добавлениями городов

##### Стек

- PHP 8.1
- Laravel 10.48
- MySQL

###### Установка проекта

1. Клонируем репозиторий

```bash
git clone https://github.com/KonstantinKliman/test-task-cities.git
```

2. Устанавливаем зависимости

```bash
composer install
```

3. Для того, чтобы настроить файл окружения (.env), нужно переименовать файл .env.example в .env.

4. Выполняем миграцию для создания таблиц в базе данных

```bash
php artisan migrate
```

5. Забираем данные городов с API hh.ru

```bash
php artisan parse:cities 
```

***P.S***

При необходимости могу обернуть в docker-контейнер.
