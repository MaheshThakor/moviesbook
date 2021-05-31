<?php

namespace App\Repositories;

use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model

/**
 * Class IUserRepository.
 */
interface IUserRepository{

    public function getAllUsers();

    public function getUserById($id);

    public function createOrUpdate( $id = null, $collection = [] );

    public function deleteUser($id);

}
