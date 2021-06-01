<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use App\Models\Movie;
use App\Repositories\IHomeRepository;
use Illuminate\Http\Request;

class MainPageController extends Controller
{
    public $movie;
    public function __construct(IHomeRepository $home)
    {
        $this->movie = $home;
    }

    public function index(){
        $trending = $this->movie->getTrending();
        $popular = $this->movie->getPopular();
        return view('welcome',compact('trending','popular'));
    }

    public function popularMovies(){

        return view('welcome');
    }

    public function trendingMovies(){

        return view('welcome');
    }

    public function search(Request $request){

        return view('welcome');
    }
}
