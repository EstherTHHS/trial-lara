<?php

namespace App\Providers;

use App\Repositories\UserRepository;
use App\Repositories\InquiryRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositories\CategoryRepository;
use App\Interfaces\UserRepositoryInterface;
use App\Interfaces\InquiryRepositoryInterface;
use App\Interfaces\CategoryRepositoryInterface;


class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->app->singleton(UserRepositoryInterface::class, UserRepository::class);

        $this->app->singleton(CategoryRepositoryInterface::class, CategoryRepository::class);

        $this->app->singleton(InquiryRepositoryInterface::class, InquiryRepository::class);
    }
}
