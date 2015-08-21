<?php namespace Orchestra\Imagine;

use Imagine\Image\ImagineInterface;
use Illuminate\Contracts\Foundation\Application;
use Orchestra\Support\Providers\ServiceProvider;

class ImagineServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('orchestra.imagine', function (Application $app) {
            $manager = new ImagineManager($app);
            $namespace = $this->hasPackageRepository() ? 'orchestra/imagine::' : 'orchestra.imagine';

            $manager->setConfig($app->make('config')->get($namespace));

            return $manager;
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
        $this->app->alias('orchestra.imagine', ImagineManager::class);

        $this->app->bind(ImagineInterface::class, function (Application $app) {
            return $app->make('orchestra.imagine')->driver();
        });
    }

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $path = realpath(__DIR__.'/../resources');

        $this->addConfigComponent('orchestra/imagine', 'orchestra/imagine', "{$path}/config");

        if (! $this->hasPackageRepository()) {
            $this->bootUsingLaravel($path);
        }
    }

    /**
     * Boot using Laravel setup.
     *
     * @param  string  $path
     *
     * @return void
     */
    protected function bootUsingLaravel($path)
    {
        $this->mergeConfigFrom("{$path}/config/config.php", 'orchestra.imagine');

        $this->publishes([
            "{$path}/config/config.php" => config_path('orchestra/imagine.php'),
        ]);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['orchestra.imagine', ImagineInterface::class];
    }
}
