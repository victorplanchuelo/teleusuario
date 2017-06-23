<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ActiveServicesProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
	    view()->composer(
		    'main.main_sidebar',
		    'App\Http\ViewComposers\ActiveServicesComposer@getActiveServices'
	    );
    }
}
