<?php

namespace CryptoBot\Providers;

use CryptoBot\Application\User\Repository\UserRepositoryInterface;
use CryptoBot\Repository\UserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
    }

    public function boot(): void
    {}
}
