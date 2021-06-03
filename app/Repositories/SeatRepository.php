<?php

namespace App\Repositories;

use App\Models\Seat;
use App\Models\SeatReserved;

class SeatRepository implements ISeatRepository
{
    public function getAllSeats()
    {
        return Seat::all();
    }

    public function getSeatById($id)
    {
        return Seat::find($id);
    }

    public function getAllReservedSeats()
    {
        return SeatReserved::all();
    }

    public function model()
    {
        return Seat::class;
    }

    public function storeSeats($id, $collection = [])
    {

    }
}
