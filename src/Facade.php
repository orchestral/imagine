<?php

namespace Orchestra\Imagine;

/**
 * @method \Imagine\Image\ImageInterface create(\Imagine\Image\BoxInterface $size, \Imagine\Image\Palette\Color\ColorInterface $color = null)
 * @method \Imagine\Image\ImageInterface open(string|\Imagine\File\LoaderInterface|mixed $path)
 * @method \Imagine\Image\ImageInterface load(string $string)
 * @method \Imagine\Image\ImageInterface read(resource $resource)
 * @method \Imagine\Image\ImageInterface font(string $file, int $size, \Imagine\Image\Palette\Color\ColorInterface $color)
 * @method \Imagine\Image\ImageInterface setMetadataReader(\Imagine\Image\Metadata\MetadataReaderInterface $metadataReader)
 * @method \Imagine\Image\Metadata\MetadataReaderInterface getMetadataReader()
 *
 * @see \Orchestra\Imagine\ImagineManager
 */
class Facade extends \Illuminate\Support\Facades\Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'orchestra.imagine';
    }
}
