<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use App\Models\Movie;
use Illuminate\Http\Request;

class ActorController extends Controller
{
    public function index(){
        return view('admin.actor',['actor'=>Actor::all()]);
    }
    public function store(Request $request){
        Actor::create([
            'name'=>$request->actor_name,
            'image'=> base64_encode(file_get_contents($request->file('actor_image'))),
            'bio'=>$request->actor_bio,
            'birth_date'=>$request->actor_dob,
        ]);
        return view('admin.actor',['actor'=>Actor::all()]);
    }
    public  function show($id){
        return view('actor.index',['actor'=>Actor::select("*")->where("id", "=", $id)->get()]);
    }
}
