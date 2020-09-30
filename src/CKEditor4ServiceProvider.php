<?php

namespace JulioMotol\CKEditor;

use Illuminate\Support\ServiceProvider;
use JulioMotol\CKEditor\Commands\InstallCommand;

class SkeletonServiceProvider extends ServiceProvider
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
