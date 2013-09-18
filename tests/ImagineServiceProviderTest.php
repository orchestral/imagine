<?php namespace Orchestra\Imagine\TestCase;

use Illuminate\Container\Container;
use Orchestra\Imagine\ImagineServiceProvider;

class ImagineServiceProviderTest extends \PHPUnit_Framework_TestCase {

	/**
	 * Test Orchestra\Imagine\ImagineServiceProvider::register() method 
	 * register instance of "orchestra.imagine".
	 *
	 * @test
	 */
	public function testRegisterMethod()
	{
		$app  = new Container;
		$stub = new ImagineServiceProvider($app);

		$stub->register();
		$this->assertInstanceOf('\Orchestra\Imagine\ImagineManager', $app['orchestra.imagine']);
	}
}
