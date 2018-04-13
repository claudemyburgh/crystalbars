<?php

namespace App\Providers;

// use App\Windowstyle;
use App\Category;
use Illuminate\Support\ServiceProvider;

class CategoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Category::creating(function($q){
            $q->slug = str_slug($q->name);
        });

        Category::updating(function($q){
            $q->slug = str_slug($q->name);
        });



    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
