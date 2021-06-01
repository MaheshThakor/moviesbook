<?php

namespace App\Repositories;

use App\Models\City;
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
        Theatre::create([
            'city_id' => $collection['city_id'],
            'theatre_name' => $collection['theatre_name'],
            'seats_no' => $collection['total_seats'],
        ]);
    }

    public function storeCity($id = null, $collection = [])
    {
        City::create([
            'city_name' => $collection['city_name'],
        ]);
    }

    public function model()
    {
        return Theatre::class;
    }
}
