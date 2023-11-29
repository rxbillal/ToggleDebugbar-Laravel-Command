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

   ```PHP
   php artisan debug on
   php artisan debug off
   ```
   V2

   ```PHP
   php artisan debug --enable
   php artisan debug --disable
   ```


<h3>Complete theses task to active Command</h3>


