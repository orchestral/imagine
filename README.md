Imagine Package for Laravel 4
==============

`Orchestra\Imagine` is a Laravel 4 package wrapper for [Imagine](https://github.com/avalanche123/Imagine).

[![Latest Stable Version](https://poser.pugx.org/orchestra/imagine/v/stable.png)](https://packagist.org/packages/orchestra/imagine) 
[![Total Downloads](https://poser.pugx.org/orchestra/imagine/downloads.png)](https://packagist.org/packages/orchestra/imagine) 
[![Build Status](https://travis-ci.org/orchestral/imagine.png?branch=master)](https://travis-ci.org/orchestral/imagine) 
[![Coverage Status](https://coveralls.io/repos/orchestral/imagine/badge.png?branch=master)](https://coveralls.io/r/orchestral/imagine?branch=master) 
[![Scrutinizer Quality Score](https://scrutinizer-ci.com/g/orchestral/imagine/badges/quality-score.png?s=0145a4f1a1b4620bda1a98cecdb710ddf53abc17)](https://scrutinizer-ci.com/g/orchestral/imagine/) 

## Quick Installation

To install through composer, simply put the following in your `composer.json` file:

```json
{
	"require": {
		"orchestra/imagine": "2.3.*@dev"
	}
}
```

Add `Orchestra\Imagine\ImagineServiceProvider` service provider in `app/config/app.php`.

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

