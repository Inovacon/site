<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        Validator::extend('cpf', 'App\Validators\CpfValidator@validate');
        Validator::extend('cnpj', 'App\Validators\CnpjValidator@validate');

        Blade::if('role', function ($role) {
            return optional(auth()->user())->hasRole($role);
        });

        if ($this->app->isLocal()) {
            DB::listen(function ($query) {
                Log::channel('queries')->info($query->sql);
            });
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
