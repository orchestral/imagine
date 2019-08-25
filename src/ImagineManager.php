<?php

namespace Orchestra\Imagine;

use Imagine\Gd\Imagine as Gd;
use Illuminate\Support\Manager;
use Imagine\Gmagick\Imagine as Gmagick;
use Imagine\Imagick\Imagine as Imagick;
use Orchestra\Support\Concerns\WithConfiguration;

class ImagineManager extends Manager
{
    use WithConfiguration;

    /**
     * Configuration values.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Create an instance of the GD driver.
     *
     * @return \Imagine\Gd\Imagine
     */
    protected function createGdDriver(): Gd
    {
        return new Gd();
    }

    /**
     * Create an instance of the Gmagick driver.
     *
     * @return \Imagine\Gmagick\Imagine
     */
    protected function createGmagickDriver(): Gmagick
    {
        return new Gmagick();
    }

    /**
     * Create an instance of the Imagick driver.
     *
     * @return \Imagine\Imagick\Imagine
     */
    protected function createImagickDriver(): Imagick
    {
        return new Imagick();
    }

    /**
     * Get default Imagine driver.
     *
     * @return string
     */
    public function getDefaultDriver()
    {
        return $this->configurations['driver'] ?? 'gd';
    }

    /**
     * Set the default driver.
     *
     * @param  string   $name
     *
     * @return void
     */
    public function setDefaultDriver($name)
    {
        $this->configurations['driver'] = $name;
    }
}
