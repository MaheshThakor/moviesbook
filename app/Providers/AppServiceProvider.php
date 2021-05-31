<?php

namespace App\Providers;

use App\Repositories\ActorRepository;
use App\Repositories\IActorRepository;
use App\Repositories\IMovieRepository;
use App\Repositories\IUserRepository;
use App\Repositories\MovieRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(IUserRepository::class, UserRepository::class);
        $this->app->bind(IActorRepository::class, ActorRepository::class);
        $this->app->bind(IMovieRepository::class, MovieRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
