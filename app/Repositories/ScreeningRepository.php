<?php

namespace App\Repositories;

use App\Models\Movie;
use App\Models\Screening;
use App\Models\Theatre;

class ScreeningRepository implements IScreeningRepository
{
    public function getAllScreening()
    {
        return Screening::all();
    }

    public function getScreeningById($id)
    {
        return Screening::find($id);
    }

    public function getScreeningByMovieId($id)
    {
        return Screening::where('movie_id', $id)->first();
    }

    public function storeScreening($id = null, $collection = [])
    {
        $theatre = Theatre::find($collection['theatre_id']);
        $movie = Movie::find($collection['movie_id']);
        $theatre->movies()->attach($movie, ['screening_time' => $collection['screening_time']]);
        return true;
    }

    public function model()
    {
        return Screening::class;
    }
}
