Imagine Package for Laravel 4
==============

Orchestra\Imagine is a Laravel 4 package wrapper for [Imagine](https://github.com/avalanche123/Imagine).

[![Latest Stable Version](https://poser.pugx.org/orchestra/imagine/v/stable.png)](https://packagist.org/packages/orchestra/imagine) 
[![Total Downloads](https://poser.pugx.org/orchestra/imagine/downloads.png)](https://packagist.org/packages/orchestra/imagine) 
[![Build Status](https://travis-ci.org/orchestral/imagine.png?branch=master)](https://travis-ci.org/orchestral/imagine) 
[![Coverage Status](https://coveralls.io/repos/orchestral/imagine/badge.png?branch=master)](https://coveralls.io/r/orchestral/imagine?branch=master)

## Quick Installation

To install through composer, simply put the following in your `composer.json` file:

```json
{
	"require": {
		"orchestra/imagine": "1.0.*@dev"
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

