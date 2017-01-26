Imagine (Wrapper) Component for Laravel 5
==============

[![Join the chat at https://gitter.im/orchestral/platform/components](https://badges.gitter.im/Join%20Chat.svg)](https://gitter.im/orchestral/platform/components?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=badge)

Imagine (Wrapper) Component is a Laravel 5 package wrapper for [Imagine](https://github.com/avalanche123/Imagine).

[![Latest Stable Version](https://img.shields.io/github/release/orchestral/imagine.svg?style=flat-square)](https://packagist.org/packages/orchestra/imagine)
[![Total Downloads](https://img.shields.io/packagist/dt/orchestra/imagine.svg?style=flat-square)](https://packagist.org/packages/orchestra/imagine)
[![MIT License](https://img.shields.io/packagist/l/orchestra/imagine.svg?style=flat-square)](https://packagist.org/packages/orchestra/imagine)
[![Build Status](https://img.shields.io/travis/orchestral/imagine/3.4.svg?style=flat-square)](https://travis-ci.org/orchestral/imagine)
[![Coverage Status](https://img.shields.io/coveralls/orchestral/imagine/3.4.svg?style=flat-square)](https://coveralls.io/r/orchestral/imagine?branch=3.4)
[![Scrutinizer Quality Score](https://img.shields.io/scrutinizer/g/orchestral/imagine/3.4.svg?style=flat-square)](https://scrutinizer-ci.com/g/orchestral/imagine/)

## Table of Content

* [Version Compatibility](#version-compatibility)
* [Installation](#installation)
* [Configuration](#configuration)
* [Usage](#usage)

## Version Compatibility

Laravel    | Imagine
:----------|:----------
 4.0.x     | 2.0.x
 4.1.x     | 2.1.x
 4.2.x     | 2.2.x
 5.0.x     | 3.0.x
 5.1.x     | 3.1.x
 5.2.x     | 3.2.x
 5.3.x     | 3.3.x
 5.4.x     | 3.4.x@dev

## Installation

To install through composer, simply put the following in your `composer.json` file:

```json
{
	"require": {
		"orchestra/imagine": "~3.0"
	}
}
```

And then run `composer install` from the terminal.

### Quick Installation

Above installation can also be simplify by using the following command:

	composer require "orchestra/imagine=~3.0"

## Configuration

Add `Orchestra\Imagine\ImagineServiceProvider` service provider in `config/app.php`.

```php
'providers' => [

	// ...

	Orchestra\Imagine\ImagineServiceProvider::class,
],
```

Add `Imagine` alias in `config/app.php`.

```php
'aliases' => [

	// ...

	'Imagine' => Orchestra\Imagine\Facade::class,
],
```

## Usage

Here a simple example how to create a thumbnail from an image:

```php
<?php

use Imagine\Image\Box;
use Imagine\Image\ImageInterface;
use Orchestra\Imagine\Facade as Imagine;

function create_thumbnail($path, $filename, $extension)
{
    $width  = 320;
    $height = 320;
    $mode   = ImageInterface::THUMBNAIL_OUTBOUND;
    $size   = new Box($width, $height);

    $thumbnail   = Imagine::open("{$path}/{$filename}.{$extension}")->thumbnail($size, $mode);
    $destination = "{$filename}.thumb.{$extension}";

    $thumbnail->save("{$path}/{$destination}");
}
```
