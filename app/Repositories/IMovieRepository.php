<?php

namespace App\Repositories;

interface IMovieRepository{

    public function getAllMovie();

    public function getMovie($id);

    public function storeMovie($id = null, $collection = []);

    public function storeCast($id = null, $collection = []);
}
