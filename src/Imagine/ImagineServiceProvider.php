<?php namespace Orchestra\Imagine;

use Illuminate\Support\ServiceProvider;

class ImagineServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var boolean
     */
    protected $defer = true;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bindShared('orchestra.imagine', function ($app) {
            return new ImagineManager($app);
        });

        $this->registerCoreContainerAliases();
    }

    /**
     * Register the core class aliases in the container.
     *
     * @return void
     */
    protected function registerCoreContainerAliases()
    {
        $this->app->alias('orchestra.imagine', 'Orchestra\Imagine\ImagineManager');

        $this->app->bind('Imagine\Image\ImagineInterface', function ($app) {
            return $app['orchestra.imagine']->driver();
        });
    }

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $path = realpath(__DIR__.'/../');

        $this->package('orchestra/imagine', 'orchestra/imagine', $path);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array('orchestra.imagine');
    }
}
