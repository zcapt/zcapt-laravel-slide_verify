# zcapt-laravel-slide_verify

## Getting Started
These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.

### Prerequisites
What things you need to install the software.

* Git.
* PHP.
* Composer.
* Laravel CLI.
* Laravel Valet (optional).
* A webserver like Nginx or Apache.

### Install
Clone the git repository on your computer
```
$ git clone https://github.com/zcapt/zcapt-laravel-slide_verify.git
```

You can also download the entire repository as a zip file and unpack in on your computer if you do not have git

After cloning the application, you need to install it's dependencies. 
```
$ cd zcapt-laravel-slide_verify
$ composer install
```

### Setup
- When you are done with installation, copy the `.env.example` file to `.env`
```
$ cp .env.example .env
```




- Add your database credentials to the necessary `env` fields

- Migrate the application
```
$ php artisan migrate
```

- Seed Database
```
php artisan db:seed
```

### Generate application key

```
$php artisan key:generate
```

### Convert url to base64

```
$php artisan base64:generate
```

### Run the application
```
$ php artisan serve
```


