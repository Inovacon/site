<?php

namespace App\Providers;

use MercadoPago\SDK;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Payment\MercadoPagoController;
use App\Http\Controllers\Payment\PaymentControllerInterface;

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

        $this->bootBlade();
        $this->bootValidation();

        $this->logQueriesWhileDeveloping();
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            PaymentControllerInterface::class,
            MercadoPagoController::class
        );
    }

    /**
     * Register the custom blade directives.
     */
    protected function bootBlade()
    {
        Blade::if('role', function ($role) {
            return optional(auth()->user())->hasRole($role);
        });
    }

    /**
     * Register the custom validators.
     */
    protected function bootValidation()
    {
        Validator::extend('cpf', 'App\Validators\CpfValidator@validate');
        Validator::extend('cnpj', 'App\Validators\CnpjValidator@validate');
    }

    /**
     * Log the SQL queries to a file when the environment is local.
     */
    protected function logQueriesWhileDeveloping()
    {
        if ($this->app->isLocal()) {
            DB::listen(function ($query) {
                Log::channel('queries')->info($query->sql);
            });
        }
    }
}
