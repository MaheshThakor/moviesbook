<?php

namespace App\Repositories;

use App\Models\Actor;
use App\Models\Movie;

class MovieRepository implements IMovieRepository
{
    protected $movie = null;

    public function getAllMovie()
    {
    return Movie::all();
    }

    public function getMovie($id)
    {
    }

    public function storeMovie($id = null, $collection = [])
    {
        if(is_null($id)) {
            $movie = new Movie();
            $movie->title = $collection['movie_title'];
            $movie->poster = $collection[0]['image'];
            $movie->runtime = $collection['movie_runtime'];
            $movie->overview = $collection['movie_overview'];
            $movie->release_year = $collection['movie_release_year'];
            $movie->is_popular = $collection['movie_popular'];
            $movie->is_trending = $collection['movie_trending'];
            return $movie->save();
        }
        $movie = Movie::find($id);
        $movie->title = $collection['movie_title'];
        $movie->poster = $collection[0]['image'];
        $movie->runtime = $collection['movie_runtime'];
        $movie->overview = $collection['movie_overview'];
        $movie->release_year = $collection['movie_release_year'];
        $movie->is_popular = $collection['movie_popular'];
        $movie->is_trending = $collection['movie_trending'];
        return $movie->save();

    }

    public function storeCast($id = null, $collection = [])
    {
        if(is_null($id)) {
            $movie = Movie::find($collection['movie_id']);
            $actor = Actor::find($collection['movie_actor_id']);
            $movie->actors()->attach($actor,['role'=>$collection['movie_actor_roll']]);
            return response(['message'=>'Movie Added'],200);
        }
        $movie = Movie::find($collection['movie_id']);
        $actor = Actor::find($collection['movie_actor_id']);
        $movie->actors()->attach($actor,['role'=>$collection['movie_actor_roll']]);
        return response(['message'=>'Movie Added'],200);
    }

    public function model()
    {
        return Movie::class;
    }
}
