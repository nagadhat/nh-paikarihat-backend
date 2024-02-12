<?php

namespace App\Providers;

use App\Models\ProductCart;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        view()->composer('*', function ($view) {
            // $sessionId = session()->getId();
            // $ipdaddress = $_SERVER['REMOTE_ADDR'];
            // dd($ipdaddress);

            // dd($product_count);
            // $view->with('product_count', $product_count);

            // if(Auth::check()){

            //     $product_count = ProductCart::where('user_id', Auth()->user()->id)->count();
            //     $view->with('product_count', $product_count);
            // }
            // dd($product_count);

            // $product_count = ProductCart::where('user_id', auth()->id())->first();
            // dd($product_count);


            // $view->with('ipdaddress', $ipdaddress);
        });
    }
}
