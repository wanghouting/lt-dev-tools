<?php

namespace LTUpdate\Extension;


use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\Application as LaravelApplication;
use LTUpdate\Extension\Console\Commands\InstallCommand;

//use Laravel\Lumen\Application as LumenApplication;

class LaravelServiceProvider extends  ServiceProvider
{
    protected $commands = [
            InstallCommand::class,
        ];
     /**
     * Booting the package.
     */
    public function boot()
    {
        $this->setupConfig();
        $this->loadViewsFrom(__DIR__.'/Resources/views', 'ltupdate');
        $this->loadMigrationsFrom(__DIR__.'/Databases/migrations');
        $this->publishes([__DIR__.'/Resources/assets' => public_path('vendor/lt-dev-update')], 'ltupdate-assets');

    }


    /**
     * Register the service provider.
     */
    public function register()
    {
         $this->commands($this->commands);
    }

    /**
     * Setup the config.
     */
    protected function setupConfig()
    {
        $configSource = realpath(__DIR__ . '/config.php');
        if ($this->app instanceof LaravelApplication && $this->app->runningInConsole()) {
            $this->publishes([
                $configSource => config_path('ltupdate.php')
            ]);
        }
//        elseif ($this->app instanceof LumenApplication) {
//            $this->app->configure('ltbackup');
//        }
        $this->mergeConfigFrom($configSource, 'ltupdate');

    }



}
