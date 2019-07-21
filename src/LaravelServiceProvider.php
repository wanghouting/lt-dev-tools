<?php

namespace LTTools\Extension;


use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\Application as LaravelApplication;
use LTTools\Extension\Console\Commands\InstallCommand;

//use Laravel\Lumen\Application as LumenApplication;

class LaravelServiceProvider extends  ServiceProvider
{
    protected $commands = [
        InstallCommand::class,
    ];


    /**
     * The application's route middleware.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'lttools.base'       => Middleware\Base::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'lttools' => [
            'lttools.base',
        ],
    ];
    /**
     * Booting the package.
     */
    public function boot()
    {



        if (method_exists($this, 'loadViewsFrom')) {
            $this->loadViewsFrom(__DIR__.'/Resources/views', 'lttools');

            if (method_exists($this, 'publishes')) {
                $this->publishes([
                    __DIR__.'/Resources/views' => base_path('/resources/views/vendor/lttools'),
                ], 'views');
                $this->setupConfig();

            }}

        $this->loadMigrationsFrom(__DIR__.'/Databases/migrations');
        $this->publishes([__DIR__.'/Resources/assets' => public_path('vendor/lttools')], 'lttools-assets');
        $this->loadRoutesFrom(__DIR__.'/Route/routes.php');
    }


    /**
     * Register the service provider.
     */
    public function register()
    {
        $this->commands($this->commands);
        $this->registerRouteMiddleware();
    }

    /**
     * Setup the config.
     */
    protected function setupConfig()
    {
        $configSource = realpath(__DIR__ . '/config.php');
        if ($this->app instanceof LaravelApplication && $this->app->runningInConsole()) {
            $this->publishes([
                $configSource => config_path('lttools.php')
            ]);
        }
//        elseif ($this->app instanceof LumenApplication) {
//            $this->app->configure('ltbackup');
//        }
        $this->mergeConfigFrom($configSource, 'lttools');

    }

    /**
     * Register the route middleware.
     *
     * @return void
     */
    protected function registerRouteMiddleware()
    {
        // register route middleware.
        foreach ($this->routeMiddleware as $key => $middleware) {
            app('router')->aliasMiddleware($key, $middleware);
        }

        // register middleware group.
        foreach ($this->middlewareGroups as $key => $middleware) {
            app('router')->middlewareGroup($key, $middleware);
        }
    }


}
