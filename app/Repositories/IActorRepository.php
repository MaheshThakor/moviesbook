<?php

namespace App\Repositories;

interface IActorRepository{

    public function getAllActor();

    public function getActor($id);

    public function storeActor($id = null, $collection = []);
}
