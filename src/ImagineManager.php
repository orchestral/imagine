<?php namespace Orchestra\Imagine;

use Imagine\Gd\Imagine as Gd;
use Illuminate\Support\Manager;
use Imagine\Gmagick\Imagine as Gmagick;
use Imagine\Imagick\Imagine as Imagick;

class ImagineManager extends Manager
{
    /**
     * Create an instance of the GD driver.
     *
     * @return \Imagine\Gd\Imagine
     */
    protected function createGdDriver()
    {
        return new Gd;
    }

    /**
     * Create an instance of the Gmagick driver.
     *
     * @return \Imagine\Gmagick\Imagine
     */
    protected function createGmagickDriver()
    {
        return new Gmagick;
    }

    /**
     * Create an instance of the Imagick driver.
     *
     * @return \Imagine\Imagick\Imagine
     */
    protected function createImagickDriver()
    {
        return new Imagick;
    }

    /**
     * Get default Imagine driver.
     *
     * @return string
     */
    public function getDefaultDriver()
    {
        return $this->app['config']->get('orchestra/imagine::driver', 'gd');
    }

     /**
     * Set the default driver.
     *
     * @param  string   $name
     * @return void
     */
    public function setDefaultDriver($name)
    {
        $this->app['config']->set('orchestra/imagine::driver', $name);
    }
}
