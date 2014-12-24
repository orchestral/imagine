Imagine (Wrapper) Component for Laravel 4
==============

Imagine (Wrapper) Component is a Laravel 4 package wrapper for [Imagine](https://github.com/avalanche123/Imagine).

[![Latest Stable Version](https://img.shields.io/github/release/orchestral/imagine.svg?style=flat)](https://packagist.org/packages/orchestra/imagine)
[![Total Downloads](https://img.shields.io/packagist/dt/orchestra/imagine.svg?style=flat)](https://packagist.org/packages/orchestra/imagine)
[![MIT License](https://img.shields.io/packagist/l/orchestra/imagine.svg?style=flat)](https://packagist.org/packages/orchestra/imagine)
[![Build Status](https://img.shields.io/travis/orchestral/imagine/2.0.svg?style=flat)](https://travis-ci.org/orchestral/imagine)
[![Coverage Status](https://img.shields.io/coveralls/orchestral/imagine/2.0.svg?style=flat)](https://coveralls.io/r/orchestral/imagine?branch=2.0)
[![Scrutinizer Quality Score](https://img.shields.io/scrutinizer/g/orchestral/imagine/2.0.svg?style=flat)](https://scrutinizer-ci.com/g/orchestral/imagine/)

## Table of Content

* [Version Compatibility](#version-compatibility)
* [Installation](#installation)
* [Configuration](#configuration)

## Version Compatibility

Laravel    | Imagine
:----------|:----------
 4.0.x     | 2.0.x


## Installation

To install through composer, simply put the following in your `composer.json` file:

```json
{
	"require": {
		"orchestra/imagine": "2.0.*"
	}
}
```

And then run `composer install` from the terminal.

### Quick Installation

Above installation can also be simplify by using the following command:

	composer require "orchestra/imagine=2.0.*"

Add `Orchestra\Imagine\ImagineServiceProvider` service provider in `app/config/app.php`.

## Configuration

```php
'providers' => array(

	// ...

	'Orchestra\Imagine\ImagineServiceProvider',
),
```

Add `Imagine` alias in `app/config/app.php`.

```php
'aliases' => array(

	// ...

	'Imagine' => 'Orchestra\Imagine\Facade',
),
```

