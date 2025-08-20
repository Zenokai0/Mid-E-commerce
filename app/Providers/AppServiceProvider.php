<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;

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
        
        if (Schema::hasTable('user_cart')) {
        $cart_count = DB::table('user_cart')
            ->where('user_id', 1)
            ->count();

        View::share([
            'cart_count' => $cart_count
        ]);
    } else {
        // fallback so views still have the variable
        View::share([
            'cart_count' => 0
        ]);
    }
    }
}
