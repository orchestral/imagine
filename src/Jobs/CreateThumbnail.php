<?php namespace Orchestra\Imagine\Jobs;

use Imagine\Image\Box;
use Imagine\Image\ImageInterface;

class CreateThumbnail extends Generator
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
        $width = $height = $data['dimension'];

        return $image->thumbnail(new Box($width, $height), $data['mode'], $data['filter']);
    }

    /**
     * Get default options.
     *
     * @return array
     */
    protected function getDefaultOptions()
    {
        return [
            'dimension' => 200,
            'filter'    => ImageInterface::FILTER_UNDEFINED,
            'format'    => '{filename}.thumb.{extension}',
            'mode'      => ImageInterface::THUMBNAIL_OUTBOUND,
        ];
    }
}
