<?php

namespace App\Service;

use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider as IServiceProvider;

use App\Service\User\IUserService;
use App\Service\User\UserService;
use App\Service\Category\ICategoryService;
use App\Service\Category\CategoryService;
use App\Service\Post\IPostService;
use App\Service\Post\PostService;
class ServiceProvider extends IServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        App::bind(IUserService::class, UserService::class);
        App::bind(ICategoryService::class, CategoryService::class);
        App::bind(IPostService::class, PostService::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
