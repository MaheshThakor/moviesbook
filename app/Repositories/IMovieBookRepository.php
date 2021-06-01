<?php

namespace App\Repositories;

use App\Models\Reservation;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;

interface IMovieBookRepository
{
    public function seatNreserve( $id = null, $collection = [] );
}
