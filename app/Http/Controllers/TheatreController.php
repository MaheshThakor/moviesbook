<?php

namespace App\Http\Controllers;

use App\Repositories\ICityRepository;
use App\Repositories\ISeatRepository;
use App\Repositories\ITheatreRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class TheatreController extends Controller
{
    public $theatre;
    public $city;
    public $seats;

    public function __construct(ITheatreRepository $theatre, ICityRepository $city, ISeatRepository $seats)
    {
        $this->theatre =$theatre;
        $this->city = $city;
        $this->seats = $seats;
    }

    public function index()
    {
        $theatre = $this->theatre->getAllTheatre();
        $city = $this->city->getAllCities();
        $reserved = $this->seats->getAllReservedSeats();
        return View::make('admin.theatres', compact('theatre','city','reserved'));
    }

    public function store(Request $request)
    {
        $this->validate(request(),
            [
                'city_id' => 'required',
                'theatre_name' => 'required',
                'total_seats' => 'required'
            ]
        );
        $collection = $request->except(['_token', '_method', 'theatre_submit']);
        $this->theatre->storeTheatre($id = null,$collection);
        return redirect()->route('theatres-details');
    }

    public function city(Request $request)
    {
        $this->validate(request(),['city_name' => 'required']);
        $collection = $request->except(['_token', '_method', 'add_city']);
        $this->theatre->storeCity($id = null,$collection);
        return redirect()->route('theatres-details');
    }

    public function seat(Request $request)
    {
        $this->validate(request(),['row_number' => 'required','seat_number'=>'required','theatre_id'=>'required']);
        $collection = $request->except(['_token', '_method', 'cast_submit']);
        $this->seats->storeSeats($id = null,$collection);
        return redirect()->route('theatres-details');
    }
}
