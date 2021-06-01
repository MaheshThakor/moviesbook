<?php

namespace App\Repositories;

use App\Models\Movie;

class HomeRepository implements IHomeRepository
{

    public function getTrending()
    {
        return Movie::where('is_trending','on')->get()->take(5);
    }

    public function getPopular()
    {
        return Movie::where('is_popular','on')->get()->take(5);
    }

    public function searchMovies()
    {
        // TODO: Implement searchMovies() method.
    }

    public function getAllMovies()
    {
        // TODO: Implement getAllMovies() method.
    }

    public function model()
    {
        return Movie::class;
    }
}
