<?php

namespace App\Providers;

use App\Repositories\ActorRepository;
use App\Repositories\CityRepository;
use App\Repositories\HomeRepository;
use App\Repositories\IActorRepository;
use App\Repositories\ICityRepository;
use App\Repositories\IHomeRepository;
use App\Repositories\IMovieBookRepository;
use App\Repositories\IMovieRepository;
use App\Repositories\IScreeningRepository;
use App\Repositories\ISeatRepository;
use App\Repositories\ITheatreRepository;
use App\Repositories\IUserRepository;
use App\Repositories\MovieBookRepository;
use App\Repositories\MovieRepository;
use App\Repositories\ScreeningRepository;
use App\Repositories\SeatRepository;
use App\Repositories\TheatreRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(IUserRepository::class, UserRepository::class);
        $this->app->bind(IActorRepository::class, ActorRepository::class);
        $this->app->bind(IMovieRepository::class, MovieRepository::class);
        $this->app->bind(IScreeningRepository::class, ScreeningRepository::class);
        $this->app->bind(ITheatreRepository::class, TheatreRepository::class);
        $this->app->bind(IHomeRepository::class, HomeRepository::class);
        $this->app->bind(IMovieBookRepository::class, MovieBookRepository::class);
        $this->app->bind(ICityRepository::class, CityRepository::class);
        $this->app->bind(ISeatRepository::class, SeatRepository::class);
    }

    public function boot()
    {
        //
    }
}
