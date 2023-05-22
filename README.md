# Hotel Molveno

A hotel application made as an IT course assignment.

Made with Laravel version 9.


## Installation
You will need PHP, Composer, and a MySql server installed on your machine.

Clone the project and install dependencies:

```bash
git clone https://github.com/TeamBASED/Hotel-Molveno.git
composer install
npm install
```
This will create a directory "Hotel-Molveno" at the current location.

Make a copy of the .env.example file (need to re-add) and rename to .env:

```bash
cp .env.example .env
```

Fill in your database connection in the .env file.

Setup your database and generate your application key:

```bash
php artisan key:generate
php artisan migrate --seed
```

Run vite and artisan scripts:

```bash
npm run dev
```

```bash
Run php artisan serve
```
Now you should be able to open it by going to http://127.0.0.1:8000.