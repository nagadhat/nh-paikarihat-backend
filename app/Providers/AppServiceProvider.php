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
            $product_count = ProductCart::where('user_id', auth()->id())->count();
            $view->with('product_count', $product_count);
        });
    }
}
