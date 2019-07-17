<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Validator::extend('no_ctrl_chars', 'App\Validation\ParameterValidator@validateNoControlCharacters');
        Validator::extend('no_ctrl_chars_crlf', 'App\Validation\ParameterValidator@validateNoControlCharactersWithoutCRLF');
    }
}
