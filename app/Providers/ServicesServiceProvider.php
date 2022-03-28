<?php

namespace App\Providers;

use App\Services\CategoryService;
use App\Services\ClientService;
use App\Services\Contracts\CategoryServiceContract;
use App\Services\Contracts\ClientServiceContract;
use App\Services\Contracts\RentDetailsServiceContract;
use App\Services\Contracts\RentServiceContract;
use App\Services\RentDetailsService;
use App\Services\RentService;
use Illuminate\Support\ServiceProvider;
use App\Services\Contracts\BookServiceContract;
use App\Services\BookService;

class ServicesServiceProvider extends ServiceProvider
{
    public function boot()
    {
        //
    }

    public function register()
    {
        $this->app->bind(BookServiceContract::class, BookService::class);
        $this->app->bind(CategoryServiceContract::class, CategoryService::class);
        $this->app->bind(ClientServiceContract::class, ClientService::class);
        $this->app->bind(RentServiceContract::class, RentService::class);
        $this->app->bind(RentDetailsServiceContract::class, RentDetailsService::class);
    }
}
