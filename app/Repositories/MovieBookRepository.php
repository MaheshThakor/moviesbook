<?php

namespace App\Repositories;

use App\Models\City;
use App\Models\Movie;
use App\Models\Reservation;
use App\Models\Seat;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model

/**
 * Class MovieBookRepository.
 */
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
            Reservation::create([
                'screening_id'=>$collection['screening_id'],
                'user_id'=>auth()->user()->id,
                'reserved'=>'1'
            ]);
            $reservation = $this->latestReservation();
            $seats = Seat::find($seats);
            $reservation->seats()->attach($seats,['screening_id'=>$collection['screening_id']]);

        }
        return response(['message'=>'Movie Added'],200);

    }

    public function model()
    {
        return Reservation::class;
    }
}
