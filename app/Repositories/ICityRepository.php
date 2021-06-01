<?php

namespace App\Repositories;

interface ICityRepository
{
public function getAllCities();

public function getCityById($id);

}
