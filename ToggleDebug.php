<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ToggleDebug extends Command
{
    protected $signature = 'debug {action : on or off}';
    protected $description = 'Toggle the Laravel Debugbar on or off.';

    public function handle()
    {
        $action = $this->argument('action');

        if ($action === 'on') {
            $this->enableDebugbar();
        } elseif ($action === 'off') {
            $this->disableDebugbar();
        } else {
            $this->info('Invalid action. Please use "on" or "off".');
        }
    }

//------------------------------------------------------------------//
//                         ENABLE DEBUGBAR                          //
//------------------------------------------------------------------//
    private function enableDebugbar(){
        $this->updateDebugbarConfig(true);
        $this->info('Debugbar enabled.');
    }

//------------------------------------------------------------------//
//                        DISIBLE DEBUGBAR                          //
//------------------------------------------------------------------//
    private function disableDebugbar(){
        $this->updateDebugbarConfig(false);
        $this->info('Debugbar disabled.');
    }

//------------------------------------------------------------------//
//                        UPDATE ENV                                //
//------------------------------------------------------------------//
    private function updateDebugbarConfig($enabled)
    {
        $envFilePath = base_path('.env');
        $currentEnv = file_get_contents($envFilePath);

        $newEnv = preg_replace('/^APP_DEBUG=(true|false)$/m', 'APP_DEBUG=' . ($enabled ? 'true' : 'false'), $currentEnv);

        file_put_contents($envFilePath, $newEnv);

        // Clear configuration cache
        $this->call('config:clear');
    }
}
