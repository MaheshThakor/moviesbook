<?php

namespace App\Http\Controllers;
use App\Repositories\IHomeRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class MainPageController extends Controller
{
    public $movie;

    public function __construct(IHomeRepository $home)
    {
        $this->movie = $home;
    }

    public function index()
    {
        $trending = $this->movie->getTrending();
        $popular = $this->movie->getPopular();
        return view('welcome', compact('trending', 'popular'));
    }


    public function popularMovies()
    {
        $popular = $this->movie->getPopular();
        return View::make('movie.popular',compact('popular'));
    }

    public function trendingMovies()
    {
        $trending = $this->movie->getTrending();
        return View::make('movie.trending',compact('trending'));
    }

    public function search(Request $request)
    {

        return view('welcome');
    }
}
