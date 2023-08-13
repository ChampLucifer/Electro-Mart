<?php

namespace App\Providers;

use App\Models\Brand;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\Setting;
use App\Models\Category;
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
        Paginator::useBootstrap();
        $setting = Setting::first();
        $global_cats = Category::orderBy('created_at', 'DESC')->limit(7)->get();
        $global_brands = Brand::orderBy('created_at', 'DESC')->limit(7)->get();
        View::share('app_setting',$setting,);
        View::share('global_cats',$global_cats);
        View::share('global_brands',$global_brands);
        
    }
}
