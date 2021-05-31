<?php

namespace App\Http\Controllers;

use App\Models\Cast;
use App\Models\Movie;
use App\Models\Screening;
use App\Repositories\IActorRepository;
use App\Repositories\IMovieRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class MovieController extends Controller
{
    public $movie;
    public $actor;

    public function __construct(IMovieRepository $movie,IActorRepository $actor)
    {
        $this->movie = $movie;
        $this->actor = $actor;
    }

    public function index(){
        $movie = $this->movie->getAllMovie();
        $actor = $this->actor->getAllActor();;
        return View::make('admin.movies', compact('movie','actor'));
    }

    public function store(Request $request, $id = null){
        $this->validate(request(),
            [
                'movie_title'=>'required',
                'movie_runtime'=>'required',
                'movie_overview'=>'required',
                'movie_release_year'=>'required',
            ]
        );
        $collection = $request->except(['_token','_method','movie_image','movie_submit']);
        $image = ['image'=>base64_encode(file_get_contents($request->file('movie_image')))];
        $collection[] = array_push($collection,$image);
        if( ! is_null( $id ) )
        {
            $this->movie->storeMovie($id, $collection);
        }
        else
        {
            $this->movie->storeMovie($id = null, $collection);
        }
        return redirect()->route('movies-details');
    }

    public function cast(Request $request , $id = null){

        $this->validate(request(),
            [
                'movie_id'=>'required',
                'movie_actor_id'=>'required',
                'movie_actor_roll'=>'required'
            ]
        );
        $collection = $request->except(['_token','_method','cast_submit']);

        if( ! is_null( $id ) )
        {
            $this->movie->storeCast($id, $collection);
        }
        else
        {
            $this->movie->storeCast($id = null, $collection);
        }

//        Cast::create([
//            'movie_id'=>$request->movie_id,
//            'actor_id'=>$request->movie_actor_id,
//            'role'=>$request->movie_actor_roll
//        ]);
        return redirect()->route('movies-details');
    }
    public function show($id){
        $screening = Screening::select("*")->where("movie_id", "=", $id)->get();
        return view('movie.index',['movie'=>Movie::select("*")->where("id", "=", $id)->get(),'screening' => $screening]);
    }
    public function search(Request $request){
        $movie = Movie::select("*")->where("title", "LIKE", "%{$request->searchbar}%")->get();
        return view('welcome',['search'=>$movie]);
    }
}
