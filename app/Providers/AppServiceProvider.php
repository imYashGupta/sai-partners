<?php

namespace App\Providers;

use App\Category;
use App\Property;
use App\SiteSettings;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {   
        view()->composer("Partials._header",function ($view) {
            $heaferinfo=SiteSettings::find(1);
            $category=Category::where("id","!=",1)->get();
            $view->with("app",["category" => $category,"info" => (object) json_decode($heaferinfo->value)]);
        });
        view()->composer("Partials._footer",function ($view) {
            $footerinfo=SiteSettings::find(2);
            $social=SiteSettings::find(3);
            $recents=Property::where("status",'1')->latest()->limit(2)->get();
            $view->with("app",["recentsFooters" => $recents,"info" => (object) json_decode($footerinfo->value),"social" => (object) json_decode($social->value)]);
        });



        Schema::defaultStringLength(191); //NEW: Increase StringLength
    }
}
