Imagine (Wrapper) Component for Laravel
==============

Imagine (Wrapper) Component is a Laravel package wrapper for [Imagine](https://github.com/avalanche123/Imagine).

[![tests](https://github.com/orchestral/imagine/workflows/tests/badge.svg?branch=6.x)](https://github.com/orchestral/imagine/actions?query=workflow%3Atests+branch%3A6.x)
[![Latest Stable Version](https://poser.pugx.org/orchestra/imagine/v/stable)](https://packagist.org/packages/orchestra/imagine)
[![Total Downloads](https://poser.pugx.org/orchestra/imagine/downloads)](https://packagist.org/packages/orchestra/imagine)
[![Latest Unstable Version](https://poser.pugx.org/orchestra/imagine/v/unstable)](//packagist.org/packages/orchestra/imagine)
[![License](https://poser.pugx.org/orchestra/imagine/license)](https://packagist.org/packages/orchestra/imagine)

## Version Compatibility

Laravel    | Imagine
:----------|:----------
 5.5.x     | 3.5.x
 5.6.x     | 3.6.x
 5.7.x     | 3.7.x
 5.8.x     | 3.8.x
 6.x       | 4.x
 7.x       | 5.x
 8.x       | 6.x

## Installation

To install through composer, run the following command from terminal:

    composer require "orchestra/imagine"

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

use Imagine\Image\ImageInterface;
use Orchestra\Imagine\Jobs\CreateThumbnail;

dispatch(new CreateThumbnail([
    'path' => $path,
    'filename' => $filename, // filename without extension
    'extension' => $extension,
    'format' => '{filename}.thumb.{extension}',
    'dimension' => 320, // width and height will be 320.
    'mode' => ImageInterface::THUMBNAIL_OUTBOUND,
    'filter' => ImageInterface::FILTER_UNDEFINED,
]));
```
