<?php

namespace App\Repositories;

use App\Models\Theatre;

class TheatreRepository implements ITheatreRepository
{

    public function getAllTheatre()
    {
        return Theatre::all();
    }

    public function getTheatre($id)
    {
        return Theatre::find($id);
    }

    public function getTheatreByString($query)
    {
        $query = $query['searchbar'];
        return Theatre::where("theatre_name", "LIKE", "%{$query}%")->get();;
    }

    public function storeTheatre($id = null, $collection = [])
    {
    }

    public function model()
    {
        return Theatre::class;
    }
}
