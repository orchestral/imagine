<?php

namespace Orchestra\Imagine\Tests;

use Illuminate\Container\Container;
use Orchestra\Imagine\ImagineServiceProvider;
use Orchestra\Testbench\TestCase;

class ImagineServiceProviderTest extends TestCase
{
    /**
     * Get package providers.
     *
     * @param  \Illuminate\Foundation\Application  $app
     *
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [ImagineServiceProvider::class];
    }

    /** @test */
    public function it_can_register_expected_services()
    {
        $this->assertInstanceOf('Orchestra\Imagine\ImagineManager', $this->app['orchestra.imagine']);
    }

    /**
     * @test
     * @define-env usesGdDriver
     * @requires extension gd
     */
    public function it_can_boot_using_gd()
    {
        $this->assertInstanceOf('Imagine\Gd\Imagine', $this->app->make('Imagine\Image\ImagineInterface'));
        $this->assertInstanceOf('Imagine\Gd\Imagine', $this->app['orchestra.imagine']->driver());
        $this->assertInstanceOf('Imagine\Gd\Imagine', $this->app['orchestra.imagine']->driver('gd'));
    }

    /**
     * @test
     * @define-env usesImagickDriver
     * @requires extension imagick
     */
    public function it_can_boot_using_imagick()
    {
        $this->assertInstanceOf('Imagine\Imagick\Imagine', $this->app->make('Imagine\Image\ImagineInterface'));
        $this->assertInstanceOf('Imagine\Imagick\Imagine', $this->app['orchestra.imagine']->driver());
        $this->assertInstanceOf('Imagine\Imagick\Imagine', $this->app['orchestra.imagine']->driver('imagick'));
    }

    /**
     * @test
     * @define-env usesGmagickDriver
     * @requires extension gmagick
     */
    public function it_can_boot_using_gmagick()
    {
        $this->assertInstanceOf('Imagine\Gmagick\Imagine', $this->app->make('Imagine\Image\ImagineInterface'));
        $this->assertInstanceOf('Imagine\Gmagick\Imagine', $this->app['orchestra.imagine']->driver());
        $this->assertInstanceOf('Imagine\Gmagick\Imagine', $this->app['orchestra.imagine']->driver('gmagick'));
    }

    /** @test */
    public function it_provides_expected_services()
    {
        $app = new Container();

        $this->assertContains('orchestra.imagine', with(new ImagineServiceProvider($app))->provides());
    }

    public function usesGdDriver($app)
    {
        $app['config']->set('orchestra.imagine', ['driver' => 'gd']);
    }

    public function usesImagickDriver($app)
    {
        $app['config']->set('orchestra.imagine', ['driver' => 'imagick']);
    }

    public function usesGmagickDriver($app)
    {
        $app['config']->set('orchestra.imagine', ['driver' => 'gmagick']);
    }
}
