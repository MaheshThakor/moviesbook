<?php

namespace App\Http\Controllers;
use App\Models\Actor;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }
    public function actor(){
        return view('admin.actor');
    }
    public function theatres(){
        return view('admin.theatres');
    }

}
