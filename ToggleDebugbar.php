<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ToggleDebugbar extends Command
{
    protected $signature = 'debug {--enable : Enable the Debugbar} {--disable : Disable the Debugbar}';
    protected $description = 'Toggle the Laravel Debugbar on or off.';

    public function handle()
    {
        if ($this->option('enable')) {
            $this->enableDebugbar();
        } elseif ($this->option('disable')) {
            $this->disableDebugbar();
        } else {
            $this->info('Please specify either --enable or --disable.');
        }
    }

//------------------------------------------------------------------//
//                        ENABLE DEBUGBAR                           //
//------------------------------------------------------------------//
    private function enableDebugbar()
    {
        $this->updateDebugbarConfig(true);
        $this->info('Debugbar enabled.');
    }


//------------------------------------------------------------------//
//                        DISIBLE DEBUGBAR                          //
//------------------------------------------------------------------//
    private function disableDebugbar()
    {
        $this->updateDebugbarConfig(false);
        $this->info('Debugbar disabled.');
    }


//------------------------------------------------------------------//
//                        UPDATE ENV DATA                           //
//------------------------------------------------------------------//
    private function updateDebugbarConfig($enabled)
    {
        $envFilePath = base_path('.env');

        $currentEnv = file_get_contents($envFilePath);

        $newEnv = preg_replace('/^APP_DEBUG=(true|false)$/m', 'APP_DEBUG=' . ($enabled ? 'true' : 'false'), $currentEnv);

        file_put_contents($envFilePath, $newEnv);

        $this->call('config:clear');
    }
}
