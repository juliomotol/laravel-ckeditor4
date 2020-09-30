<?php

namespace JulioMotol\CKEditor4\Tests;

use JulioMotol\CKEditor4\CKEditor4ServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function getPackageProviders($app)
    {
        return [
            CKEditor4ServiceProvider::class,
        ];
    }
}
