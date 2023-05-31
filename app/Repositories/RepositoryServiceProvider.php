<?php
namespace App\Repositories;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            "App\Repositories\Interface\IStockRepository",
            "App\Repositories\StockRepository"
        );

        $this->app->bind(
            "App\Repositories\Interface\ICategoryRepository",
            "App\Repositories\CategoryRepository"
        );
    }

    public function boot()
    {
        //
    }
}

