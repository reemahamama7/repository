<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use App\Repositories\Eloquent\ProductRepository;

class RepositoryServiceProvider extends ServiceProvider {
    /**
    * Register services.
    */

    public function register() {
        $this->app->bind(
            ProductRepositoryInterface::class,
            ProductRepository::class
        );
    }

    /**
    * Bootstrap services.
    */

    public function boot(): void {
        //
    }
}