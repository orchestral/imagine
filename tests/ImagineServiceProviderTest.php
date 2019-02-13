<?php

namespace Orchestra\Imagine\TestCase;

use Mockery as m;
use PHPUnit\Framework\TestCase;
use Illuminate\Container\Container;
use Orchestra\Imagine\ImagineServiceProvider;

class ImagineServiceProviderTest extends TestCase
{
    /**
     * Teardown the test environment.
     */
    public function tearDown(): void
    {
        m::close();
    }

    /** @test */
    public function it_can_register_expected_services()
    {
        $app = m::mock('\Illuminate\Container\Container, \Illuminate\Contracts\Foundation\Application')->makePartial();
        $config = m::mock('\Illuminate\Contracts\Config\Repository');
        $app->instance('config', $config);

        $config->shouldReceive('get')->once()->with('orchestra.imagine')->andReturn([]);

        $stub = new ImagineServiceProvider($app);
        $stub->register();

        $this->assertInstanceOf('\Orchestra\Imagine\ImagineManager', $app['orchestra.imagine']);
    }

    /**
     * @test
     * @requires extension gd
     */
    public function it_can_boot_using_gd()
    {
        $app = m::mock('\Illuminate\Container\Container, \Illuminate\Contracts\Foundation\Application')->makePartial();
        $config = m::mock('\Illuminate\Contracts\Config\Repository');
        $files = m::mock('\Illuminate\Filesystem\Filesystem');

        $app->instance('config', $config);
        $app->instance('files', $files);

        $app->shouldReceive('basePath')->andReturn(__DIR__.'/../');

        $files->shouldReceive('isDirectory')->andReturn(false);
        $config->shouldReceive('get')->once()->with('orchestra.imagine')->andReturn(['driver' => 'gd']);

        $stub = m::mock('\Orchestra\Imagine\ImagineServiceProvider[bootUsingLaravel]', [$app])
                    ->shouldAllowMockingProtectedMethods();

        $stub->shouldReceive('bootUsingLaravel')->once()->with(realpath(__DIR__.'/../resources'))->andReturnNull();

        $stub->register();
        $stub->boot();

        $this->assertInstanceOf('\Imagine\Gd\Imagine', $app->make('Imagine\Image\ImagineInterface'));
        $this->assertInstanceOf('\Imagine\Gd\Imagine', $app['orchestra.imagine']->driver());
        $this->assertInstanceOf('\Imagine\Gd\Imagine', $app['orchestra.imagine']->driver('gd'));
    }

    /**
     * @test
     * @requires extension imagick
     */
    public function it_can_boot_using_imagick()
    {
        $app = m::mock('\Illuminate\Container\Container, \Illuminate\Contracts\Foundation\Application')->makePartial();
        $config = m::mock('\Illuminate\Contracts\Config\Repository');
        $files = m::mock('\Illuminate\Filesystem\Filesystem');

        $app->instance('config', $config);
        $app->instance('files', $files);

        $app->shouldReceive('basePath')->andReturn(__DIR__.'/../');

        $files->shouldReceive('isDirectory')->andReturn(false);
        $config->shouldReceive('get')->once()->with('orchestra.imagine')->andReturn(['driver' => 'imagick']);

        $stub = m::mock('\Orchestra\Imagine\ImagineServiceProvider[bootUsingLaravel]', [$app])
                    ->shouldAllowMockingProtectedMethods();

        $stub->shouldReceive('bootUsingLaravel')->once()->with(realpath(__DIR__.'/../resources'))->andReturnNull();

        $stub->register();
        $stub->boot();

        $this->assertInstanceOf('\Imagine\Imagick\Imagine', $app->make('Imagine\Image\ImagineInterface'));
        $this->assertInstanceOf('\Imagine\Imagick\Imagine', $app['orchestra.imagine']->driver());
        $this->assertInstanceOf('\Imagine\Imagick\Imagine', $app['orchestra.imagine']->driver('imagick'));
    }

    /**
     * @test
     * @requires extension gmagick
     */
    public function it_can_boot_using_gmagick()
    {
        $app = m::mock('\Illuminate\Container\Container, \Illuminate\Contracts\Foundation\Application')->makePartial();
        $config = m::mock('\Illuminate\Contracts\Config\Repository');
        $files = m::mock('\Illuminate\Filesystem\Filesystem');

        $app->instance('config', $config);
        $app->instance('files', $files);

        $app->shouldReceive('basePath')->andReturn(__DIR__.'/../');

        $files->shouldReceive('isDirectory')->andReturn(false);
        $config->shouldReceive('get')->once()->with('orchestra.imagine')->andReturn(['driver' => 'gmagick']);

        $stub = m::mock('\Orchestra\Imagine\ImagineServiceProvider[bootUsingLaravel]', [$app])
                    ->shouldAllowMockingProtectedMethods();

        $stub->shouldReceive('bootUsingLaravel')->once()->with(realpath(__DIR__.'/../resources'))->andReturnNull();

        $stub->register();
        $stub->boot();

        $this->assertInstanceOf('\Imagine\Gmagick\Imagine', $app->make('Imagine\Image\ImagineInterface'));
        $this->assertInstanceOf('\Imagine\Gmagick\Imagine', $app['orchestra.imagine']->driver());
        $this->assertInstanceOf('\Imagine\Gmagick\Imagine', $app['orchestra.imagine']->driver('gmagick'));
    }

    /** @test */
    public function it_provides_expected_services()
    {
        $app = new Container();

        $stub = new ImagineServiceProvider($app);

        $this->assertContains('orchestra.imagine', $stub->provides());
    }
}
