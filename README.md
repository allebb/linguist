# Linguist

[![Build](https://github.com/allebb/linguist/workflows/build/badge.svg)](https://github.com/allebb/linguist/actions)
[![Code Coverage](https://codecov.io/gh/allebb/linguist/branch/master/graph/badge.svg)](https://codecov.io/gh/allebb/linguist)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/allebb/linguist/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/allebb/linguist/?branch=master)
[![Code Climate](https://codeclimate.com/github/allebb/linguist/badges/gpa.svg)](https://codeclimate.com/github/allebb/linguist)
[![Latest Stable Version](https://poser.pugx.org/ballen/linguist/v/stable)](https://packagist.org/packages/ballen/linguist)
[![Latest Unstable Version](https://poser.pugx.org/ballen/linguist/v/unstable)](https://packagist.org/packages/ballen/linguist)
[![License](https://poser.pugx.org/ballen/linguist/license)](https://packagist.org/packages/ballen/linguist)

Linguist is a PHP library for parsing strings, it can extract and manipulate prefixed words in content ideal for working with @mentions, #topics and custom tags!

Requirements
------------

* PHP >= 7.3.0

This library is unit tested against PHP 7.3, 7.4 and 8.0!

If you need to use an older version of PHP, you should instead install the 1.x version of this library (see below for details).

License
-------

This library is released under the [GPLv3](https://raw.githubusercontent.com/allebb/linguist/master/LICENSE) license, you are welcome to use it, improve it and contribute your changes back!

Installation
------------

The recommended way of installing this library is via. [Composer](http://getcomposer.org); To install using Composer type the following command at the console:

```shell
composer require ballen/linguist
```

**If you need to use an older version of PHP, version 1.x.x supports PHP 5.6, 7.0, 7.1 and 7.2, you can install this version using Composer with this command instead:**

```shell
composer require ballen/linguist ^1.0
```


Examples
--------

A set of working examples can be found in the ``/examples`` directory.

Tests and coverage
------------------

This library is fully unit tested using [PHPUnit](https://phpunit.de/).

I use [GitHub Actions](https://github.com/) for continuous integration, which triggers tests for PHP 7.3, 7.4 and 8.0 every time a commit is pushed.

If you wish to run the tests yourself you should run the following:

```shell
# Install the Linguist Library with the 'development' packages this then includes PHPUnit!
composer install

# Now we run the unit tests (from the root of the project) like so:
./vendor/bin/phpunit
```

Code coverage can also be run but requires XDebug installed...

```shell
./vendor/bin/phpunit --coverage-html ./report
```

Support
-------

I am happy to provide support via. my personal email address, so if you need a hand drop me an email at: [ballen@bobbyallen.me]().
