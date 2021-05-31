<?php

namespace App\Repositories;
use App\Models\Actor;

class ActorRepository implements IActorRepository
{
    protected $actor = null;

    public function getAllActor(){
        return Actor::all();
    }

    public function getActor($id){
        return Actor::find($id);
    }

    public function storeActor($id = null, $collection = []){

        if(is_null($id)) {
            $actor = new Actor();
            $actor->name = $collection['actor_name'];
            $actor->image = $collection[0]['image'];
            $actor->bio = $collection['actor_bio'];
            $actor->birth_date = $collection['actor_dob'];
            return $actor->save();
        }
        $actor = Actor::find($id);
        $actor->name = $collection['actor_name'];
        $actor->image = $collection[0]['image'];
        $actor->bio = $collection['actor_bio'];
        $actor->birth_date = $collection['actor_dob'];
        return $actor->save();

    }


    public function model()
    {
        return Actor::class;
    }
}
