<?php

namespace JulioMotol\CKEditor4;

use Illuminate\Support\ServiceProvider;
use JulioMotol\CKEditor4\Commands\InstallCommand;

class CKEditor4ServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/ckeditor4.php' => config_path('ckeditor4.php'),
            ], 'config');

            $this->commands([
                InstallCommand::class,
            ]);
        }
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/ckeditor4.php', 'ckeditor4');
    }
}
