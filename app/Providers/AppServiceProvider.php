<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

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

        view()->share(
            'data_sidebar',
            DB::table('posts')
                ->join('categories', 'categories.id', '=', 'posts.category_id')
                ->join('authors', 'authors.id', '=', 'posts.author_id')
                ->select('posts.*', 'categories.name as cate', 'authors.name')
                ->orderBy('posts.created_at', 'desc')
                ->limit(6)
                ->get()

        );

        view()->share(
            'categories',
            DB::table('categories')
                ->get()
        );
    }
}
