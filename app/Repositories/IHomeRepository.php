<?php

namespace App\Repositories;

interface IHomeRepository
{
    public function getTrending();

    public function getPopular();

    public  function searchMovies();

    public function getAllMovies();
}
