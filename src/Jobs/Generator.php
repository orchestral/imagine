<?php

namespace Orchestra\Imagine\Jobs;

use Illuminate\Support\Arr;
use Imagine\Image\ImageInterface;
use Imagine\Image\ImagineInterface;
use Orchestra\Support\Str;

abstract class Generator extends Job
{
    /**
     * Generator options.
     *
     * @var array
     */
    protected $options = [];

    /**
     * Construct a new Job.
     */
    public function __construct(array $options)
    {
        $this->options = $options;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(ImagineInterface $imagine)
    {
        $data = $this->getFilteredOptions($this->options);
        $path = \rtrim($data['path'], '/');

        $source = Str::replace('{filename}.{extension}', $data);
        $destination = Str::replace($data['format'], $data);

        $this->handleImageManipulation(
            $imagine->open("{$path}/{$source}"), $data
        )->save("{$path}/{$destination}");
    }

    /**
     * Get filtered options.
     *
     * @return array
     */
    protected function getFilteredOptions(array $options)
    {
        $default = $this->getDefaultOptions();
        $options = \array_merge($default, $options);

        $uses = \array_unique(\array_merge([
            'path', 'filename', 'extension', 'format',
        ], \array_keys($default)));

        $data = Arr::only($options, $uses);

        return $data;
    }

    /**
     * Handle image manipulation.
     */
    abstract protected function handleImageManipulation(ImageInterface $image, array $data): ImageInterface;

    /**
     * Get default options.
     */
    abstract protected function getDefaultOptions(): array;
}
