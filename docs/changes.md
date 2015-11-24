---
title: Imagine Change Log

---

## Version 3.2 {#v3-2}

### v3.2.0 {#v3-2-0}

* Update support to Laravel Framework v5.2.
* Improved performances by reducing call within `Illuminate\Container\Container`.
* Create dispatchable job that you can use to create image thumbnail via `Orchestra\Imagine\Jobs\CreateThumbnail`.
* Create dispatchable job that you can use to resize an image via `Orchestra\Imagine\Jobs\ResizeImage`.

## Version 3.1 {#v3-1}

### v3.1.2 {#v3-1-2}

* Fixes dispatchable job not resizing the file as expected.

### v3.1.1 {#v3-1-1}

* Improved performances by reducing call within `Illuminate\Container\Container`.
* Create dispatchable job that you can use to create image thumbnail via `Orchestra\Imagine\Jobs\CreateThumbnail`.
* Create dispatchable job that you can use to resize an image via `Orchestra\Imagine\Jobs\ResizeImage`.

### v3.1.0 {#v3-1-0}

* Update support to Laravel Framework v5.1.

## Version 3.0 {#v3-0}

### v3.0.1 {#v3-0-1}

* Add fallback support to Laravel 5 configuration.

### v3.0.0 {#v3-0-0}

* Update support to Laravel Framework v5.0.
* Simplify PSR-4 path.

## Version 2.2 {#v2-2}

### v2.2.1 {#v2-2-1}

* Update `Orchestra\Imagine\ImagineManager::getDefaultDriver()` to comply with Laravel Framework.

### v2.2.0 {#v2-2-0}

* Bump minimum version to PHP v5.4.0.
* Add support for Laravel Framework v4.2.

## Version 2.1 {#v2-1}

### v2.1.1 {#v2-1-1}

* Add DI container binding for `Orchestra\Imagine\ImageManager` and `Imagine\Image\ImagineInterface`.

### v2.1.0 {#v2-1-0}

* Bump version for Laravel 4.1

## Version 2.0 {#v2-0}

### v2.0.0 {#v2-0-0}

* Fixed predefine path.
* Bump version to match other Orchestra Platform components.
