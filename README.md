<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">Test task yii 2</h1>
    <br>
</p>

The test task yii 2


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


DEPLOYMENT
------------

### Install via Composer

If you do not have [Composer](http://getcomposer.org/), you may install it by following the instructions
at [getcomposer.org](http://getcomposer.org/doc/00-intro.md#installation-nix).

Then you need to set dependencies in the project:

~~~
composer install
~~~

Now you should be able to access the application through the following URL, assuming `basic` is the directory
directly under the Web root.

~~~
http://localhost/web/
~~~


CONFIGURATION
-------------

### Database
`use Mysql minimum version 5.6 `

You must first restore the data from the dump:

`
mysql -u <user> -p < test_task_yii.sql
`


Then edit the file `config/db.php` with real data, username and password:


```php
return [
    ...
    'username' => <user>,
    'password' => <password>,
    ...
];
``