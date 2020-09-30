<?php

namespace JulioMotol\CKEditor4\Commands;

use Illuminate\Console\GeneratorCommand;

class InstallCommand extends GeneratorCommand
{
    const SHOULD_OVERWRITE_QUESTION = 'CKEditor4 is already installed, do you want to overwrite the old installation?';

    public $signature = 'ckeditor4:install';

    public $description = 'Install CKEditor4';

    public function getStub()
    {
        return;
    }

    public function handle()
    {
        $publishPath = config('ckeditor4.publish_path');
        $ckeditorVendorPath = base_path('vendor/ckeditor/ckeditor');

        if ($this->files->exists($publishPath) && ! $this->confirm(self::SHOULD_OVERWRITE_QUESTION)) {
            return 1;
        }

        $this->files->makeDirectory($publishPath, 0755, true, true);

        $this->files->copy($ckeditorVendorPath . '/ckeditor.js', $publishPath . '/ckeditor.js');
        $this->files->copy($ckeditorVendorPath . '/config.js', $publishPath . '/config.js');
        $this->files->copy($ckeditorVendorPath . '/styles.js', $publishPath . '/styles.js');
        $this->files->copy($ckeditorVendorPath . '/contents.css', $publishPath . '/contents.css');
        $this->files->copyDirectory($ckeditorVendorPath . '/adapters', $publishPath . '/adapters');
        $this->files->copyDirectory($ckeditorVendorPath . '/lang', $publishPath . '/lang');
        $this->files->copyDirectory($ckeditorVendorPath . '/skins', $publishPath . '/skins');
        $this->files->copyDirectory($ckeditorVendorPath . '/plugins', $publishPath . '/plugins');

        $this->info('CKEditor4 have been publish in ' . $publishPath);

        return 0;
    }
}
