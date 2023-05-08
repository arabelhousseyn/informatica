<?php

namespace App\Providers;

use App\Models\Ad;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // note if you want to migrate the db you should to comment to code below
        if (app()->environment(['production', 'local', 'development'])) {
            $categories = Category::onlyParent()->with('children')->get()->toTree();
            $banner_product = Product::Banner()->first();
            $ads = Ad::all();

            $json = file_get_contents(base_path('app').'/Support/json/algerian_cities.json');
            $algerianCities = json_decode($json, true);

            View::share([
                'categories' => $categories, 'banner_product' => $banner_product, 'ads' => $ads, 'algerianCities' => $algerianCities,
            ]);
        }

        Paginator::useBootstrap();
        //Model::preventLazyLoading(! app()->isProduction());
    }
}
