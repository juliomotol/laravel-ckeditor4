<?php

namespace JulioMotol\CKEditor\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use JulioMotol\CKEditor\CKEditor4ServiceProvider;

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
