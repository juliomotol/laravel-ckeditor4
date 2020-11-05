<?php

namespace JulioMotol\CKEditor4\Tests;

use JulioMotol\CKEditor4\Commands\InstallCommand;

class InstallCommandTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        /** @var \Illuminate\Filesystem\Filesystem */
        $files = $this->app['files'];

        $files->copyDirectory(__DIR__.'/../vendor/ckeditor', $this->app->basePath('vendor/ckeditor'));
    }

    public function tearDown(): void
    {
        /** @var \Illuminate\Filesystem\Filesystem */
        $files = $this->app['files'];

        $files->deleteDirectories($this->app->basePath('vendor'));
        $files->deleteDirectories($this->app->publicPath());

        parent::tearDown();
    }

    /** @test */
    public function it_installs_ckeditor4()
    {
        $publishPath = config('ckeditor4.publish_path');

        $this->artisan('ckeditor4:install')
            ->assertExitCode(0);

        $this->assertInstallation($publishPath);
    }

    /** @test */
    public function it_installs_ckeditor4_to_custom_path()
    {
        $publishPath = 'public/js/ckeditor';

        $this->artisan("ckeditor4:install --path={$publishPath}")
            ->assertExitCode(0);

        $this->assertInstallation(base_path($publishPath));
    }

    /** @test */
    public function it_overwrites_old_ckeditor4_installation()
    {
        $publishPath = config('ckeditor4.publish_path');

        $this->artisan('ckeditor4:install')
            ->assertExitCode(0);

        $this->artisan('ckeditor4:install')
            ->expectsConfirmation(InstallCommand::SHOULD_OVERWRITE_QUESTION, 'yes')
            ->assertExitCode(0);

        $this->assertInstallation($publishPath);
    }

    private function assertInstallation($publishPath)
    {
        $this->assertFileExists("{$publishPath}/ckeditor.js");
        $this->assertFileExists("{$publishPath}/config.js");
        $this->assertFileExists("{$publishPath}/styles.js");
        $this->assertFileExists("{$publishPath}/contents.css");
        $this->assertDirectoryExists("{$publishPath}/adapters");
        $this->assertDirectoryExists("{$publishPath}/lang");
        $this->assertDirectoryExists("{$publishPath}/skins");
        $this->assertDirectoryExists("{$publishPath}/plugins");
    }
}
