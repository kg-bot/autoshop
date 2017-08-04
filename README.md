### Step 1 ###
Run `composer install` in project root
### Step 2 ###
Open .env.example and change Database part according to your database server, then rename this file to .env
### Step 3 ###
In your project root folder run `php artisan key:generate`
### Step 4 ###
Create new database that will match info you provided in Step 2
### Step 5 ###
In your project root folder run `php artisan migrate`
### Step 6 ###
In your project root folder run `php artisan db:seed --class=DatabaseSeeder`


### Info ###
There are two users, admin and member

Member info: `password: temp123`, `email: member@example.com`

Admin info: `password: temp123`, `email: admin@example.com`

You should consult your server provider about url rewrite and vhost if you plan to use them.
