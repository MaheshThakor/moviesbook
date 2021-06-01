<?php

namespace App\Repositories;

interface IUserRepository
{

    public function getAllUsers();

    public function getUserById($id);

    public function createOrUpdate($id = null, $collection = []);

    public function deleteUser($id);

}
