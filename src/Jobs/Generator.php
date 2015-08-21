<?php namespace Orchestra\Imagine\Jobs;

use Orchestra\Support\Str;
use Illuminate\Support\Arr;
use Imagine\Image\ImageInterface;
use Illuminate\Contracts\Bus\SelfHandling;

abstract class Generator extends Job implements SelfHandling
{
    /**
     * Execute the job.
     *
     * @param  array  $options
     *
     * @return void
     */
    public function handle(array $options)
    {
        $data        = $this->getFilteredOptions($options);
        $path        = $data['path'];
        $source      = Str::replace('{filename}.{extension}', $data);
        $destination = Str::replace($format, $data);

        $image = $this->imagine->open("{$path}/{$source}");

        $this->handleImageManipulation($image, $data);

        $image->save("{$path}/{$destination}");
    }

    /**
     * Get filtered options.
     *
     * @param  array  $options
     *
     * @return array
     */
    protected function getFilteredOptions(array $options)
    {
        $default = $this->getDefaultOptions();
        $options = array_merge($options, $default);

        $uses = array_unique(array_merge([
            'path',
            'filename',
            'extension',
            'format',
        ], array_keys($default));

        $data = Arr::only($options, $uses);

        return $data;
    }

    /**
     * Handle image manipulation.
     *
     * @param  \Imagine\Image\ImageInterface  $image
     * @param  array  $data
     * @return void
     */
    abstract protected function handleImageManipulation(ImageInterface $image, array $data);

    /**
     * Get default options.
     *
     * @return array
     */
    abstract protected function getDefaultOptions();
}
