<?php

namespace App\Providers;

use App\Banner;
use App\Category;
use App\Product;
use App\Setting;
use App\SocialLink;
use App\Map;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \Schema::defaultStringLength(191);
        view()->share([
            'settings' => Setting::first(),
            'categories' => Category::get(),
            'allProducts' => Product::take(6)->orderBy('created_at' ,'ASC')->get(),
            'links' => SocialLink::get(),
            'banners' => Banner::get(),
            'map' => Map::first()
        ]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
