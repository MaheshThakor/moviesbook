<?php

namespace App\Repositories;

use App\Models\Movie;

class HomeRepository implements IHomeRepository
{

    public function getTrending()
    {
        return Movie::where('is_trending', 'on')->get()->take(5);
    }

    public function getPopular()
    {
        return Movie::where('is_popular', 'on')->get()->take(5);
    }

    public function searchMovies()
    {

    }

    public function getAllMovies()
    {
        return Movie::all();
    }

    public function model()
    {
        return Movie::class;
    }
}
