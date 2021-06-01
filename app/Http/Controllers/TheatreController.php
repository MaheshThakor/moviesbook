<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Seat;
use App\Models\SeatReserved;
use App\Models\Theatre;
use Illuminate\Http\Request;

class TheatreController extends Controller
{
    //
    public function index(){
            return view('admin.theatres',['theatre'=>Theatre::all(),'city'=>City::all(),'reserved'=>SeatReserved::all()]);
    }
    public function store(Request $request){
        Theatre::create([
            'city_id'=>$request->city_id,
            'theatre_name'=>$request->theatre_name,
            'seats_no'=>$request->total_seats,
        ]);
        return view('admin.theatres',['theatre'=>Theatre::all(),'city'=>City::all()]);
    }
    public function city(Request $request){
        City::create([
            'city_name'=>$request->city_name,
        ]);
        return view('admin.theatres',['theatre'=>Theatre::all(),'city'=>City::all()]);
    }
    public function seat(Request $request){

        for ($i=1;$i<101;$i++){
            Seat::create([
                'row_number'=>$request->row_number,
                'seat_number'=>$i,
            'theatre_id'=>$request->theatre_id
        ]);
        }


        return redirect('/theatres-details');
    }

    public function test(Request $s){
        dd($s);
//            foreach ($s->seat as $seat){
//            return $seat;
//            }

    }
}
