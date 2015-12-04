<?php namespace Orchestra\Imagine\Jobs;

use Imagine\Image\Box;
use Imagine\Image\ImageInterface;

class ResizeImage extends Generator
{
    /**
     * Handle image manipulation.
     *
     * @param  \Imagine\Image\ImageInterface  $image
     * @param  array  $data
     *
     * @return \Imagine\Image\ImageInterface
     */
    protected function handleImageManipulation(ImageInterface $image, array $data)
    {
        $width  = $data['width'];
        $height = $data['height'];

        if (isset($data['dimension'])) {
            $width = $height = $data['dimension'];
        }

        return $image->resize(new Box($width, $height), $data['filter']);
    }

    /**
     * Get default options.
     *
     * @return array
     */
    protected function getDefaultOptions()
    {
        return [
            'dimension' => null,
            'filter'    => ImageInterface::FILTER_UNDEFINED,
            'format'    => '{filename}.{width}x{height}.{extension}',
            'name'      => null,
            'width'     => 320,
            'height'    => 320,
        ];
    }
}
