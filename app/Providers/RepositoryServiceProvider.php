<?php

namespace App\Providers;

use App\Repositories\GeneralRepository;
use App\Repositories\Interfaces\GeneralRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(GeneralRepositoryInterface::class, GeneralRepository::class);
    }

}
