<?php namespace Orchestra\Imagine\Jobs;

class ResizeImage extends Generator
{
    /**
     * Handle image manipulation.
     *
     * @param  \Imagine\Image\ImageInterface  $image
     * @param  array  $data
     *
     * @return void
     */
    protected function handleImageManipulation(ImageInterface $image, array $data)
    {
        $width  = $data['width'];
        $height = $data['height'];

        if (isset($data['dimension'])) {
            $width = $height = $data['dimension'];
        }

        $image->resize(new Box($width, $height), $data['filter']);
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
