<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Carbon\Carbon;
use Validator;

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

	    // Creamos una nueva regla de validación para comprobar que la persona que
	    // se quiere registrar tiene, al menos, 18 años



	    Validator::extend('age', function($attribute, $value, $parameters, $validator) {
		    if(Carbon::parse($value)->age >= 18){
			    return true;
		    }
		    return false;
	    });

	    Validator::extend('phone_prefix', function($attribute, $value, $parameters, $validator) {
		    if((starts_with($value, '80')) || (starts_with($value, '90')))
		    {
			    return false;
		    }
		    return true;
	    });
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
