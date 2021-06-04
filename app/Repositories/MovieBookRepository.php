<?php

namespace App\Repositories;

use App\Models\City;
use App\Models\Movie;
use App\Models\Reservation;
use App\Models\Screening;
use App\Models\Seat;
use App\Models\Theatre;
use App\Notifications\SeatBookNotification;
use Illuminate\Support\Facades\Auth;
use Notification;

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

    public function sendNotification($collection = [])
    {
        $movie = $this->fetchMovie($collection['movie_id']);
        $theatre = Theatre::find($collection['theatre_id']);
        $city = $this->fetchCity($collection['city_id']);
        $screening = Screening::find($collection['screening_id']);
        $details = [
            'name' => Auth::user()->first_name." ".Auth::user()->last_name,
            'body' => "You Have Booked ".count($collection['seat_id']).
                " Tickets For Movie " .$movie->title.
                " in ".$theatre->theatre_name.",".$city->city_name.
                ".\n Show Time is : ".$screening->screening_time,
            'thanks' => 'Thank you',
            'detail' => 'You Can Visit For More Information :',
            'detailUrl' => url('/'),
            'movie_id' => $movie->id
        ];
        Notification::send(Auth::user(), new SeatBookNotification($details));
    }

    public function model()
    {
        return Reservation::class;
    }
}
