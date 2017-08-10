<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        \View::composer(
                    'modules.nav',
                    'App\Http\Composers\UslugaComposer'
                );
        \View::composer(
                    ['modules.footer', 'modules.toppanel'],
                    'App\Http\Composers\SettingComposer'
            );
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
