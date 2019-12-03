<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Tag;
use App\Post;

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
        view()->composer('layouts.sidebar', function($view){
            $tags = Tag::has('posts')->pluck('name');
            $popularPosts = Post::popular();

            $view->with(compact('tags', 'popularPosts'));
        });
    }
}
