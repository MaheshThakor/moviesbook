<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use App\Models\Movie;
use Illuminate\Http\Request;

class MainPageController extends Controller
{
    public function index(){
//        $x =Movie::where('is_trending', '=', 'on')->take(5);
        return view('welcome',['trending'=>Movie::where('is_trending','on')->get()->take(5),'popular'=>Movie::where('is_popular','on')->get()->take(5)]);
    }
}
