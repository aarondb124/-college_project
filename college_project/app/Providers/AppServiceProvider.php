<?php

namespace App\Providers;

use App\Models\Offer;
use App\Models\Branch;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Purchage;
use App\Models\Permission;
use Facade\FlareClient\View;
use App\Models\CompanyProfile;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Schema::defaultStringLength(191);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
       


        Paginator::useBootstrap();
        view()->share('content', CompanyProfile::first());
        view()->share('category', Category::get());
        view()->share('brand', Brand::get());
        // view()->share('randCategory', Category::inRandomOrder()->limit(5)->get());
        view()->share('randCategory', Category::get());
        view()->share('offer',Offer::first());
        view()->share('branch',Branch::all());
    }
}
