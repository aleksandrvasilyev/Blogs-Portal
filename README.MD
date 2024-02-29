## <img src="https://raw.githubusercontent.com/laravel/art/master/laravel-logo.png" width="25" alt="Laravel Logo"> Blogs Portal (Laravel 10.x)

Blogs Portal is an open-source platform for users to create blogs, write posts, comments, like, follow and hide objects.

## Install

Make sure you have PHP and Composer installed globally on your computer.
Clone the repo and enter the project folder

```
git clone https://github.com/aleksandrvasilyev/Blogs-Portal.git
cd Blogs-Portal
```

Install the app

```
composer install
cp .env.example .env
```
Generate key
```
php artisan key:generate
```
Run the web server

```
php artisan serve
```

That's it. Now you can use the api, i.e.

```
http://127.0.0.1:8000/api/documentation
```
