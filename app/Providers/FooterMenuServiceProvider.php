<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;

class FooterMenuServiceProvider extends ServiceProvider
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
        view()->composer('*', function($view){
            $links[] = array('name' => 'Contact US', 'link' => '/contact_us');
            if(Auth::user()){
                $links[] = array('name' => 'Profile', 'link' => route('profile'));
            }
            return $view->with('links', $links);
        });
    }
}
