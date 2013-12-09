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
        $this->app['orchestra.imagine'] = $this->app->share(function ($app) {
            return new ImagineManager($app);
        });
    }

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $path = realpath(__DIR__.'/../../');

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
