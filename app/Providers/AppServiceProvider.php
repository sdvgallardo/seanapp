<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Schema::defaultStringLength(191);

        view()->composer('layouts.blog.sidebar', function($view){
          $archives = \App\Post::archives();
          $tags = \App\Tag::has('posts')->pluck('name');
          $tagNumbers = \App\Tag::tagNumbers();

          $view->with(compact('archives', 'tags', 'tagNumbers'));
        });
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
