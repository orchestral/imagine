<?php namespace Orchestra\Imagine;

use Illuminate\Support\Arr;
use Imagine\Gd\Imagine as Gd;
use Illuminate\Support\Manager;
use Imagine\Gmagick\Imagine as Gmagick;
use Imagine\Imagick\Imagine as Imagick;

class ImagineManager extends Manager
{
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
    protected function createGdDriver()
    {
        return new Gd();
    }

    /**
     * Create an instance of the Gmagick driver.
     *
     * @return \Imagine\Gmagick\Imagine
     */
    protected function createGmagickDriver()
    {
        return new Gmagick();
    }

    /**
     * Create an instance of the Imagick driver.
     *
     * @return \Imagine\Imagick\Imagine
     */
    protected function createImagickDriver()
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
        return Arr::get($this->config, 'driver', 'gd');
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
        $this->config['driver'] = $name;
    }

    /**
     * Get configuration values.
     *
     * @return array
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * Set configuration.
     *
     * @param  array  $config
     *
     * @return $this
     */
    public function setConfig(array $config)
    {
        $this->config = $config;

        return $this;
    }
}
