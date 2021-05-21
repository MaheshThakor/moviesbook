<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use App\Models\Cast;
use App\Models\City;
use App\Models\Movie;
use App\Models\Reservation;
use App\Models\Screening;
use App\Models\Seat;
use App\Models\SeatReserved;
use App\Models\Theatre;
use Illuminate\Http\Request;

class MovieBookController extends Controller
{
    public function index($id){
        $screening = Screening::select("*")->where('id',$id)->get(1);
        $theatre = Theatre::select("*")->where('id',$screening[0]->theatre_id)->get(1);
        $reservation = Reservation::latest()->first();
        if ($reservation == null){
            $reservation = "101";
        }else{
            $reservation = $reservation->id;
        }
        return view('seats.index',[
            'movie'=>Movie::select("*")->where('id',$screening[0]->movie_id)->get(1),
            'city'=>City::select("*")->where('id',$theatre[0]->city_id)->get(1),
            'theatre'=>$theatre,
            'seat'=> Seat::all(),
            'screening'=>$screening[0]->id,
             'reserved'=>$reservation
        ]);
    }
    public function reserve(Request $request){
       Reservation::create([
            'screening_id'=>$request->screening_id,
            'user_id'=>auth()->user()->id,
            'reserved'=>'1',
        ]);
        $reservation =Reservation::latest()->first();
        SeatReserved::create([
            'seat_id'=>$request->seat_id,
            'reservation_id'=>$reservation->id,
            'screening_id'=>$request->screening_id,
        ]);
        return redirect('/');
    }
}
