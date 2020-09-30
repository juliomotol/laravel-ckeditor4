<?php

namespace JulioMotol\CKEditor\Tests;

use JulioMotol\CKEditor\CKEditor4ServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    public function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app)
    {
        return [
            CKEditor4ServiceProvider::class,
        ];
    }
}
