<?php

namespace App\Console\Commands;

use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;

#[Signature('zelocms:info')]
#[Description('Command description')]
class ZeloCmsInfo extends Command
{
    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $this->info('ZeloCoreCMS CLI Tool');
        $this->line('====================');
        $this->line('CMS Version: ' . config('app.cms.version', '1.0.0'));
        $this->line('PHP Version: ' . PHP_VERSION);
        $this->line('Laravel Version: ' . app()->version());
        $this->line('Plugin Sandbox Tier: ' . app(\App\Services\Plugin\PluginSandbox::class)->getTierDescription());
        
        return self::SUCCESS;
    }
}
