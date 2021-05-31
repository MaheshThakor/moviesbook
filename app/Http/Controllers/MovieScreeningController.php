<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Screening;
use App\Models\Theatre;
use App\Repositories\IMovieRepository;
use App\Repositories\IScreeningRepository;
use App\Repositories\ITheatreRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class MovieScreeningController extends Controller
{
    public $screening;
    public $movie;
    public $theatre;

    public function __construct(IScreeningRepository $screening, IMovieRepository $movie, ITheatreRepository $theatre)
    {
        $this->screening = $screening;
        $this->movie = $movie;
        $this->theatre = $theatre;
    }
    public function index(){
        $movie = $this->movie->getAllMovie();
        $theatre = $this->theatre->getAllTheatre();
        return View::make('admin.screening',compact('theatre','movie'));
    }
    public function store(Request $request, $id = null){
        $this->validate(request(),
            [
                'theatre_id'=>'required',
                'movie_id'=>'required',
                'screening_time'=>'required'
            ]
        );

        $collection = $request->except(['_token','theatre_submit']);


        if( ! is_null( $id ) )
        {
            $this->screening->storeScreening($id, $collection);
        }
        else
        {
            $this->screening->storeScreening($id = null, $collection);
        }

//        Screening::create([
//           'theatre_id'=>$request->theatre_id,
//           'movie_id'=>$request->movie_id,
//            'screening_time'=>$request->screening_time
//        ]);

        return redirect()->route('screening-details');
        //return view('admin.screening',['theatre'=>Theatre::all(),'movie'=>Movie::all(),'message'=>'Success']);
    }
}
