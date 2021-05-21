<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Screening;
use App\Models\Theatre;
use Illuminate\Http\Request;

class MovieScreeningController extends Controller
{
    public function index(){
        return view('admin.screening',['theatre'=>Theatre::all(),'movie'=>Movie::all()]);
    }
    public function store(Request $request){
        Screening::create([
           'theatre_id'=>$request->theatre_id,
           'movie_id'=>$request->movie_id,
            'screening_time'=>$request->screening_time
        ]);
        return view('admin.screening',['theatre'=>Theatre::all(),'movie'=>Movie::all(),'message'=>'Success']);
    }
}
