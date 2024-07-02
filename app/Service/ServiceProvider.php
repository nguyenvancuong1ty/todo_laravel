<?php

namespace App\Service;

use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider as IServiceProvider;

use App\Service\User\IUserService;
use App\Service\User\UserService;
class ServiceProvider extends IServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        App::bind(IUserService::class, UserService::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
