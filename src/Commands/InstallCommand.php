<?php

namespace JulioMotol\CKEditor4\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class InstallCommand extends Command
{
    const SHOULD_OVERWRITE_QUESTION = 'CKEditor4 is already installed, do you want to overwrite the old installation?';

    public $signature = 'ckeditor4:install
        {--path= : The publish path for the CKEditor4 assests}
        {--force : Install CKEditor4 even if installation already exists}';

    public $description = 'Install CKEditor4';

    /**
     * @var \Illuminate\Filesystem\Filesystem
     */
    protected $files;

    /**
     * @var string
     */
    protected $publishPath;

    /**
     * @var string
     */
    protected $ckeditorVendorPath;

    public function __construct(Filesystem $files)
    {
        parent::__construct();

        $this->files = $files;
        $this->ckeditorVendorPath = base_path('vendor/ckeditor/ckeditor');
    }

    public function handle()
    {
        $this->publishPath = $this->option('path')
            ? base_path($this->option('path'))
            : config('ckeditor4.publish_path');

        if (
            $this->files->exists($this->publishPath) &&
            ! $this->option('force') &&
            ! $this->confirm(self::SHOULD_OVERWRITE_QUESTION)
        ) {
            return 1;
        }

        $this->installCKEditor4();

        $this->info('CKEditor4 have been publish in ' . $this->publishPath);

        return 0;
    }

    protected function installCKEditor4()
    {
        $this->files->makeDirectory($this->publishPath, 0755, true, true);

        $this->files->copy($this->ckeditorVendorPath . '/ckeditor.js', $this->publishPath . '/ckeditor.js');
        $this->files->copy($this->ckeditorVendorPath . '/config.js', $this->publishPath . '/config.js');
        $this->files->copy($this->ckeditorVendorPath . '/styles.js', $this->publishPath . '/styles.js');
        $this->files->copy($this->ckeditorVendorPath . '/contents.css', $this->publishPath . '/contents.css');
        $this->files->copyDirectory($this->ckeditorVendorPath . '/adapters', $this->publishPath . '/adapters');
        $this->files->copyDirectory($this->ckeditorVendorPath . '/lang', $this->publishPath . '/lang');
        $this->files->copyDirectory($this->ckeditorVendorPath . '/skins', $this->publishPath . '/skins');
        $this->files->copyDirectory($this->ckeditorVendorPath . '/plugins', $this->publishPath . '/plugins');
    }
}
