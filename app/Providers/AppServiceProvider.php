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
          $tags = \App\Tag::archives();

          $view->with(compact('archives', 'tags'));
        });

        view()->composer('layouts.blog.userSidebar', function($view){
          $archives = \App\User::postArchive($view->user->id);
          $tags = \App\User::tagArchive($view->user->id);

          $view->with(compact('archives', 'tags'));
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
