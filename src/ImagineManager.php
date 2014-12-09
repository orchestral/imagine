<?php namespace Orchestra\Imagine;

use Illuminate\Support\Manager;

class ImagineManager extends Manager
{
    /**
     * Create an instance of the GD driver.
     *
     * @return \Imagine\Gd\Imagine
     */
    protected function createGdDriver()
    {
        return new \Imagine\Gd\Imagine;
    }

    /**
     * Create an instance of the Imagick driver.
     *
     * @return \Imagine\Imagick\Imagine
     */
    protected function createImagickDriver()
    {
        return new \Imagine\Imagick\Imagine;
    }

    /**
     * Create an instance of the Gmagick driver.
     *
     * @return \Imagine\Gmagick\Imagine
     */
    protected function createGmagickDriver()
    {
        return new \Imagine\Gmagick\Imagine;
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
}
