<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Setting;
use App\Models\Card;

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
        view()->composer('*', function($view){
            $settings = Setting::get();

            foreach($settings as $setting) {
                $view->with('setting', $setting);
            }
        });

        view()->composer('*', function($view){
            $cards = Card::get();

            foreach($cards as $card) {
                $view->with('card', $card);
            }
        });

        // if(!empty($settings)) {

        //     $settings = Setting::get();

        //     foreach($settings as $setting) {
        //         view()->share('setting', $setting);
        //     }
        // }
    }
}
