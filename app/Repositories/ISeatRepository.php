<?php

namespace App\Repositories;

interface ISeatRepository
{
    public function getAllSeats();

    public function getSeatById($id);

    public function getAllReservedSeats();

    public function storeSeats($id,$collection = []);

}
