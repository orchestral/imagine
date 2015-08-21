<?php namespace Orchestra\Imagine\Jobs;

use Orchestra\Support\Str;
use Illuminate\Support\Arr;
use Imagine\Image\ImageInterface;
use Imagine\Image\ImagineInterface;
use Illuminate\Contracts\Bus\SelfHandling;

abstract class Generator extends Job implements SelfHandling
{
    /**
     * Generator options.
     *
     * @var array
     */
    protected $options = [];

    /**
     * Construct a new Job.
     *
     * @param  array  $options
     */
    public function __construct(array $options)
    {
        $this->options = $options;
    }

    /**
     * Execute the job.
     *
     * @param \Imagine\Image\ImagineInterface $imagine
     *
     * @return void
     */
    public function handle(ImagineInterface $imagine)
    {
        $data = $this->getFilteredOptions($this->options);
        $path = $data['path'];

        $source      = Str::replace('{filename}.{extension}', $data);
        $destination = Str::replace($data['format'], $data);

        $this->handleImageManipulation($imagine->open("{$path}/{$source}"), $data)
            ->save("{$path}/{$destination}");
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
        $options = array_merge($default, $options);

        $uses = array_unique(array_merge([
            'path',
            'filename',
            'extension',
            'format',
        ], array_keys($default)));

        $data = Arr::only($options, $uses);

        return $data;
    }

    /**
     * Handle image manipulation.
     *
     * @param  \Imagine\Image\ImageInterface  $image
     * @param  array  $data
     *
     * @return \Imagine\Image\ImageInterface
     */
    abstract protected function handleImageManipulation(ImageInterface $image, array $data);

    /**
     * Get default options.
     *
     * @return array
     */
    abstract protected function getDefaultOptions();
}
