<?php

namespace App\Repositories;



interface IScreeningRepository{

    public function getAllScreening();

    public function getScreeningById($id);

    public function getScreeningByMovieId($id);

    public function storeScreening($id = null, $collection = []);


}
