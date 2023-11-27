<?php

namespace App\Providers;
use App\Models\Venue;
use App\Models\Category;

use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

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
        Model::unguard();
        View::share([
            'shared_categories' => Category::where('approved',true)->get(),
            'shared_venues' => Venue::where('approved', true)->get()
        ]);
    }
}
