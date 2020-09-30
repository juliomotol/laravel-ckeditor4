<?php

namespace JulioMotol\CKEditor\Commands;

use Illuminate\Console\Command;

class InstallCommand extends Command
{
    public $signature = 'ckeditor4:install';

    public $description = 'Install CKEditor4';

    public function handle()
    {
        $this->comment('All done');
    }
}
