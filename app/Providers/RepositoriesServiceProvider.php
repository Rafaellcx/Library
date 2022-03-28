<?php

namespace App\Providers;

use App\Repositories\CategoryRepository;
use App\Repositories\ClientRepository;
use App\Repositories\Contracts\CategoryRepositoryContract;
use App\Repositories\Contracts\ClientRepositoryContract;
use App\Repositories\Contracts\RentDetailsRepositoryContract;
use App\Repositories\Contracts\RentRepositoryContract;
use App\Repositories\RentDetailsRepository;
use App\Repositories\RentRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositories\Contracts\BookRepositoryContract;
use App\Repositories\BookRepository;

class RepositoriesServiceProvider extends ServiceProvider
{
    public function boot()
    {
        //
    }

    public function register()
    {
        $this->app->bind(BookRepositoryContract::class, BookRepository::class);
        $this->app->bind(CategoryRepositoryContract::class, CategoryRepository::class);
        $this->app->bind(ClientRepositoryContract::class, ClientRepository::class);
        $this->app->bind(RentRepositoryContract::class, RentRepository::class);
        $this->app->bind(RentDetailsRepositoryContract::class, RentDetailsRepository::class);
    }
}
