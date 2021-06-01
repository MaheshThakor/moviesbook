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
        for ($i = 1; $i < 101; $i++) {
            Seat::create([
                'row_number' => $collection['row_number'],
                'seat_number' => $i,
                'theatre_id' => $collection['theatre_id']
            ]);
        }
    }
}
