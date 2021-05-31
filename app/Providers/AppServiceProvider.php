<?php

namespace App\Providers;

use App\Models\Screening;
use App\Repositories\ActorRepository;
use App\Repositories\IActorRepository;
use App\Repositories\IMovieRepository;
use App\Repositories\IScreeningRepository;
use App\Repositories\ITheatreRepository;
use App\Repositories\IUserRepository;
use App\Repositories\MovieRepository;
use App\Repositories\ScreeningRepository;
use App\Repositories\TheatreRepository;
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
        $this->app->bind(IScreeningRepository::class, ScreeningRepository::class);
        $this->app->bind(ITheatreRepository::class, TheatreRepository::class);
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
