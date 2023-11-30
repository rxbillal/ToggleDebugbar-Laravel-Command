<h1>ToggleDebugbar ON OFF by command :</h1>

<h4>1. Create the custom command:</h4>

   In your terminal, run the following command to generate a new Artisan command:

      V1
        php artisan make:command ToggleDebug


      V2
        php artisan make:command ToggleDebugbar


   This will create a new file in the app/Console/Commands directory named

   ```PHP 
    ToggleDebug.php
    ToggleDebugbar.php
   ```
<h4>2. Open the generated command file:</h4>

   Edit the fille

   ```PHP
   ToggleDebug.php
   ToggleDebugbar.php
   ```
   in the app/Console/Commands directory.


<h4>3. Register the command:</h4>

   In the 

   ```PHP
   app/Console/Kernel.php
   ```
   file, add the following line in the $commands property:

   ```PHP
   protected $commands = [

    \App\Console\Commands\ToggleDebug::class,
    \App\Console\Commands\ToggleDebugbar::class,
   ];
   ```
<h4>4. Run Command:</h4>

   Now, you should be able to use your custom command:

   V1

   ```shell
   php artisan debug on
   ```
   ```shell
   php artisan debug off
   ```
   V2

   ```shell
   php artisan debug --enable
   ```
   ```shell
   php artisan debug --disable
   ```


<h1>Complete theses task to active Command</h1>



## You Don't Have Debugbar Then Install Debugbar for Laravel

## Installation

Require this package with composer. It is recommended to only require the package for development.

```shell
composer require barryvdh/laravel-debugbar --dev
```

Laravel uses Package Auto-Discovery, so doesn't require you to manually add the ServiceProvider.

The Debugbar will be enabled when `APP_DEBUG` is `true`.

> If you use a catch-all/fallback route, make sure you load the Debugbar ServiceProvider before your own App ServiceProviders.

### Laravel without auto-discovery:

If you don't use auto-discovery, add the ServiceProvider to the providers array in config/app.php

```php
Barryvdh\Debugbar\ServiceProvider::class,
```

If you want to use the facade to log messages, add this to your facades in app.php:

```php
'Debugbar' => Barryvdh\Debugbar\Facades\Debugbar::class,
```

The profiler is enabled by default, if you have APP_DEBUG=true. You can override that in the config (`debugbar.enabled`) or by setting `DEBUGBAR_ENABLED` in your `.env`. See more options in `config/debugbar.php`
You can also set in your config if you want to include/exclude the vendor files also (FontAwesome, Highlight.js and jQuery). If you already use them in your site, set it to false.
You can also only display the js or css vendors, by setting it to 'js' or 'css'. (Highlight.js requires both css + js, so set to `true` for syntax highlighting)

#### Copy the package config to your local config with the publish command:

```shell
php artisan vendor:publish --provider="Barryvdh\Debugbar\ServiceProvider"
```

### Laravel with Octane:

Make sure to add LaravelDebugbar to your flush list in `config/octane.php`.

```php
    'flush' => [
        \Barryvdh\Debugbar\LaravelDebugbar::class,
    ],
```

### Lumen:

For Lumen, register a different Provider in `bootstrap/app.php`:

```php
if (env('APP_DEBUG')) {
 $app->register(Barryvdh\Debugbar\LumenServiceProvider::class);
}
```

To change the configuration, copy the file to your config folder and enable it:

```php
$app->configure('debugbar');
```

NB. Once enabled, the collectors are added (and could produce extra overhead), so if you want to use the debugbar in production, disable in the config and only enable when needed.


## Increment Custom Command




