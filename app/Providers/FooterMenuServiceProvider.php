<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;

class FooterMenuServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        App::bind('commonHelper', function()

        {

            return new \App\Helpers\CommonHelperClass;

        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function($view){
            $links[] = array('name' => 'Contact US', 'link' => '/contact_us');
            if(Auth::user()){
                $links[] = array('name' => 'Profile', 'link' => route('profile'));
            }
            return $view->with('links', $links);
        });
    }
}
