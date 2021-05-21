<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use App\Models\Cast;
use App\Models\Movie;
use App\Models\Screening;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index(){
        return view('admin.movies',['movie'=>Movie::all(),'actor'=>Actor::all()]);
    }
    public function store(Request $request){
        Movie::create([
            'title'=>$request->movie_title,
            'poster'=> base64_encode(file_get_contents($request->file('movie_image'))),
            'runtime'=>$request->movie_runtime,
            'overview'=>$request->movie_overview,
            'release_year'=>$request->movie_release_year,
            'is_popular'=>$request->movie_popular,
            'is_trending'=>$request->movie_trending,
        ]);
        return view('admin.movies',['actor'=>Actor::all(),'movie'=>Movie::all()]);
    }
    public function cast(Request $request){
        Cast::create([
            'movie_id'=>$request->movie_id,
            'actor_id'=>$request->movie_actor_id,
            'role'=>$request->movie_actor_roll
        ]);
        return view('admin.movies',['actor'=>Actor::all(),'movie'=>Movie::all()]);
    }
    public function show($id){
        $screening = Screening::select("*")->where("movie_id", "=", $id)->get();
        return view('movie.index',['movie'=>Movie::select("*")->where("id", "=", $id)->get(),'screening' => $screening]);
    }
}
