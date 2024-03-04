<?php

namespace App\Providers;

use App\Repositories\SaleProduct\SaleProductRepository;
use App\Repositories\SaleProduct\SaleProductRepositoryInterface;
use App\Repositories\Sale\SaleRepository;
use App\Repositories\Sale\SaleRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(SaleRepositoryInterface::class, SaleRepository::class);
        $this->app->bind(SaleProductRepositoryInterface::class, SaleProductRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
