<?php

namespace App\Http\Controllers;

use App\Repositories\IMovieBookRepository;
use App\Repositories\IScreeningRepository;
use App\Repositories\ITheatreRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class MovieBookController extends Controller
{
    public $screening;
    public $theatre;
    public $movieBook;

    public function __construct(IScreeningRepository $screening, ITheatreRepository $theatre, IMovieBookRepository $movieBook)
    {
        $this->screening = $screening;
        $this->theatre = $theatre;
        $this->movieBook = $movieBook;
    }

    public function index($id)
    {
        $screening = $this->screening->getScreeningById($id);
        $theatre = $this->theatre->getTheatre($screening->theatre_id);
        $movie = $this->movieBook->fetchMovie($screening->movie_id);
        $city = $this->movieBook->fetchCity($theatre->city_id);
        $seat = $this->movieBook->fetchAllSeat();
        return View::make('seats.index',
            compact('movie', 'city', 'theatre', 'seat', 'screening'));
    }

    public function reserve(Request $request)
    {
        $this->validate(request(),
            [
                'movie_id' => 'required',
                'city_id' => 'required',
                'theatre_id' => 'required',
                'seat_id' => 'required',
                'screening_id' => 'required',
            ]
        );
        $collection = $request->except(['_token', '_method', 'submit_seats']);
        $this->movieBook->seatNreserve($collection);
        return redirect()->route('MainPage');
    }
}
