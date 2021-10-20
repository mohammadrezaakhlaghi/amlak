<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use App\User;
use Illuminate\Support\Facades\Cookie;

class BladeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('adminAccess', function ($user_id) {
        
            
        return "<?php if(App\User::where('id', $user_id)->where('role', 1)->get()->count() > 0){ ?>";
        });
        Blade::directive('endAdminAccess', function () {
            return "<?php } ?>";
        });

        Blade::directive('userAccess', function ($user_id) {
           
        return "<?php if(App\User::where('id', $user_id)->where('role', 0)->get()->count() > 0){ ?>";
        });
        Blade::directive('endUserAccess', function () {
            return "<?php } ?>";
        });
    }
}