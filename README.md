# Linguist

[![Build Status](https://travis-ci.org/allebb/linguist.svg)](https://travis-ci.org/allebb/linguist)
[![Code Coverage](https://scrutinizer-ci.com/g/allebb/linguist/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/allebb/linguist/?branch=master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/allebb/linguist/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/allebb/linguist/?branch=master)
[![Code Climate](https://codeclimate.com/github/allebb/linguist/badges/gpa.svg)](https://codeclimate.com/github/allebb/linguist)
[![Latest Stable Version](https://poser.pugx.org/ballen/linguist/v/stable)](https://packagist.org/packages/ballen/linguist)
[![Latest Unstable Version](https://poser.pugx.org/ballen/linguist/v/unstable)](https://packagist.org/packages/ballen/linguist)
[![License](https://poser.pugx.org/ballen/linguist/license)](https://packagist.org/packages/ballen/linguist)

Linguist is a PHP library for parsing strings, it can extract and manipulate prefixed words in content ideal for working with @mentions, #topics and custom tags!

Requirements
------------

* PHP >= 5.4.0

This library is unit tested against PHP 5.4, 5.5, 5.6, 7.0, 7.1, 7.2, 7.3 and the PHP nightly builds!

License
-------

This library is released under the [GPLv3](https://raw.githubusercontent.com/bobsta63/linguist/master/LICENSE) license, you are welcome to use it, improve it and contribute your changes back!

Installation
------------

The recommended way of installing this library is via. [Composer](http://getcomposer.org); To install using Composer type the following command at the console:

```shell
composer require ballen/linguist
```

Alternately you can add it to your ``composer.json`` file manually in the `require` section like so:

```php
"ballen/linguist": "^1.0"
```
Then install the package by running the ``composer update ballen/linguist`` command.

Examples
--------

A set of working examples can be found in the ``/examples`` directory.

Tests and coverage
------------------

This library is fully unit tested using [PHPUnit](https://phpunit.de/).

I use [TravisCI](https://travis-ci.org/) for continuous integration, which triggers tests for PHP 5.4, 5.5, 5.6, 7.0, 7.1, 7.2, 7.3 and the PHP nightly build every time a commit is pushed.

If you wish to run the tests yourself you should run the following:

```shell
# Install the Linguist Library with the 'development' packages this then includes PHPUnit!
composer install --dev


# Now we run the unit tests (from the root of the project) like so:
./vendor/bin/phpunit
```

Code coverage can also be ran but requires XDebug installed...

```shell
./vendor/bin/phpunit --coverage-html ./report
```

Support
-------

I am happy to provide support via. my personal email address, so if you need a hand drop me an email at: [ballen@bobbyallen.me]().
