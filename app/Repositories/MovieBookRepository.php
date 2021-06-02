<?php

namespace App\Repositories;

use App\Models\City;
use App\Models\Movie;
use App\Models\Reservation;
use App\Models\Seat;

class MovieBookRepository implements IMovieBookRepository
{
    public function fetchMovie($id)
    {
        return Movie::find($id);
    }

    public function fetchCity($id)
    {
        return City::find($id);
    }

    public function fetchAllSeat()
    {
        return Seat::all();
    }

    public function latestReservation()
    {
        return Reservation::latest()->first();
    }

    public function seatNreserve($collection = [])
    {

        foreach ($collection["seat_id"] as $seats) {
            $reservation = Reservation::create([
                'screening_id' => $collection['screening_id'],
                'user_id' => auth()->user()->id,
                'reserved' => '1'
            ]);
            $seats = Seat::find($seats);
            $reservation->seats()->attach($seats, ['screening_id' => $collection['screening_id']]);

        }
        
    }

    public function model()
    {
        return Reservation::class;
    }
}
