OwlyTest Project
============================

Visit a demo project page [Demo](http://owlytest.khromets.com/)

DIRECTORY STRUCTURE
-------------------

      assets/             contains assets definition
      commands/           contains console commands (controllers)
      config/             contains application configurations
      controllers/        contains Web controller classes
      mail/               contains view files for e-mails
      models/             contains model classes
      runtime/            contains files generated during runtime
      tests/              contains various tests for the basic application
      vendor/             contains dependent 3rd-party packages
      views/              contains view files for the Web application
      web/                contains the entry script and Web resources



REQUIREMENTS
------------

The minimum requirement by this project template that your Web server supports PHP 5.4.0.


INSTALLATION
------------

### Create a project:

Clone the repository for `pull` command availability:

~~~
git clone https://github.com/ahromets/owlytest.git project
cd project
composer install
~~~

CONFIGURATION
-------------

### Database

Edit the file `config/db.php` with real data, for example:

```php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=yii2basic',
    'username' => 'root',
    'password' => '1234',
    'charset' => 'utf8',
];
```

### Migrations

In your terminal run `yii migrate` command for apply migrations

### Google maps API key

Edit the file `config/params.php` with google api kay:

```php
return [
    'adminEmail' => 'admin@example.com',
    'GOOGLE_API_KEY' => '', // use your own api key
];
```
