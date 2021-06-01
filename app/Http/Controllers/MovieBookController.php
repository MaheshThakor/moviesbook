<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Movie;
use App\Models\Reservation;
use App\Models\Screening;
use App\Models\Seat;
use App\Models\SeatReserved;
use App\Models\Theatre;
use App\Repositories\IScreeningRepository;
use App\Repositories\ITheatreRepository;
use Illuminate\Http\Request;

class MovieBookController extends Controller
{
    public $screening;
    public $theatre;
    public function __construct(IScreeningRepository $screening, ITheatreRepository $theatre)
    {
        $this->screening = $screening;
        $this->theatre = $theatre;
    }

    public function index($id){
        $screening = $this->screening->getScreeningById($id);
        $theatre = $this->theatre->getTheatre($screening->theatre_id);
        //$reservation = Reservation::where('screening_id',$id)->get();
        return view('seats.index',[
            'movie'=>Movie::select("*")->where('id',$screening->movie_id)->get(1),
            'city'=>City::select("*")->where('id',$theatre->city_id)->get(1),
            'theatre'=>$theatre,
            'seat'=> Seat::all(),
            'screening'=>$screening->id,
             'reserved'=>$screening->id
        ]);
    }
    public function reserve(Request $request){

        foreach ($request->seat_id as $seats){
            Reservation::create([
                'screening_id'=>$request->screening_id,
                'user_id'=>auth()->user()->id,
                'reserved'=>'1'
            ]);
            $reservation = Reservation::latest()->first();
            $reservation->refresh();
            SeatReserved::create([
                'seat_id'=>$seats,
                'reservation_id'=>$reservation->id,
                'screening_id'=>$request->screening_id,
            ]);
        }


        return redirect('/');
    }
}
