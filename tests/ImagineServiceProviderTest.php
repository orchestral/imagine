<?php namespace Orchestra\Imagine\TestCase;

use Mockery as m;
use Illuminate\Container\Container;
use Orchestra\Imagine\ImagineServiceProvider;

class ImagineServiceProviderTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Teardown the test environment.
     */
    public function tearDown()
    {
        m::close();
    }

    /**
     * Test Orchestra\Imagine\ImagineServiceProvider::register() method
     * register instance of "orchestra.imagine".
     *
     * @test
     */
    public function testRegisterMethod()
    {
        $app = new Container;

        $stub = new ImagineServiceProvider($app);
        $stub->register();

        $this->assertInstanceOf('\Orchestra\Imagine\ImagineManager', $app['orchestra.imagine']);
    }

    /**
     * Test Orchestra\Imagine\ImagineServiceProvider::boot() method.
     *
     * @test
     */
    public function testBootMethod()
    {
        $app = new Container;

        $app['config'] = $config = m::mock('\Illuminate\Config\Repository');
        $app['files'] = $files = m::mock('\Illuminate\Filesystem\Filesystem');
        $app['path']  = __DIR__.'/../';

        $files->shouldReceive('isDirectory')->andReturn(false);
        $config->shouldReceive('get')->with('orchestra/imagine::driver', 'gd')->andReturn('gd');

        $stub = new ImagineServiceProvider($app);
        $stub->register();
        $stub->boot();

        $this->assertInstanceOf('\Imagine\Gd\Imagine', $app->make('Imagine\Image\ImagineInterface'));
        $this->assertInstanceOf('\Imagine\Gd\Imagine', $app['orchestra.imagine']->driver());
        $this->assertInstanceOf('\Imagine\Gd\Imagine', $app['orchestra.imagine']->driver('gd'));
        $this->assertInstanceOf('\Imagine\Imagick\Imagine', $app['orchestra.imagine']->driver('imagick'));
        $this->assertInstanceOf('\Imagine\Gmagick\Imagine', $app['orchestra.imagine']->driver('gmagick'));
    }

    /**
     * Test Orchestra\Imagine\ImagineServiceProvider::provides() method.
     *
     * @test
     */
    public function testProvidesMethod()
    {
        $app = new Container;

        $stub = new ImagineServiceProvider($app);

        $this->assertEquals(array('orchestra.imagine'), $stub->provides());
    }
}
