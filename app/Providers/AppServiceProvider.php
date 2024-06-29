<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

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
     *
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        Schema::defaultStringLength(191);

        Validator::extend('dateearlier', function($attribute, $value, $parameters, $validator) {
            $date_compare = \Arr::get($validator->getData(), $parameters[0]);
            return Carbon::parse($date_compare) > Carbon::parse($value);
        });
    }
}
