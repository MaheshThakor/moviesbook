<?php

namespace App\Http\Controllers;

use App\Repositories\IActorRepository;
use App\Repositories\IMovieRepository;
use App\Repositories\IScreeningRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class MovieController extends Controller
{
    public $movie;
    public $actor;
    public $screening;

    public function __construct(IMovieRepository $movie, IActorRepository $actor, IScreeningRepository $screening)
    {
        $this->movie = $movie;
        $this->actor = $actor;
        $this->screening = $screening;
    }

    public function index()
    {
        $movie = $this->movie->getAllMovie();
        $actor = $this->actor->getAllActor();;
        return View::make('admin.movies', compact('movie', 'actor'));
    }

    public function store(Request $request, $id = null)
    {
        $this->validate(request(),
            [
                'movie_title' => 'required',
                'movie_runtime' => 'required',
                'movie_overview' => 'required',
                'movie_release_year' => 'required',
            ]
        );
        $collection = $request->except(['_token', '_method', 'movie_image', 'movie_submit']);
        $image = ['image' => base64_encode(file_get_contents($request->file('movie_image')))];
        $collection[] = array_push($collection, $image);
        if (!is_null($id)) {
            $this->movie->storeMovie($id, $collection);
        } else {
            $this->movie->storeMovie($id = null, $collection);
        }
        return redirect()->route('movies-details');
    }

    public function cast(Request $request, $id = null)
    {

        $this->validate(request(),
            [
                'movie_id' => 'required',
                'movie_actor_id' => 'required',
                'movie_actor_roll' => 'required'
            ]
        );
        $collection = $request->except(['_token', '_method', 'cast_submit']);

        if (!is_null($id)) {
            $this->movie->storeCast($id, $collection);
        } else {
            $this->movie->storeCast($id = null, $collection);
        }

        return redirect()->route('movies-details');
    }

    public function show($id)
    {
        $screening = $this->screening->getScreeningByMovieId($id);
        $movie = $this->movie->getMovie($id);
        return View::make('movie.index', compact('movie', 'screening'));
    }

    public function search(Request $request)
    {
        $this->validate(request(),
            [
                'searchbar' => 'required'
            ]
        );
        $query = $request->except(['_token']);
        $search = $this->movie->getMovieByString($query);
        return view('welcome', compact('search'));
    }
}
