<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository implements IUserRepository
{
    protected $user = null;

    public function getAllUsers()
    {
        return User::all();
    }

    public function getUserById($id)
    {
        return User::find($id);
    }

    public function createOrUpdate($id = null, $collection = [])
    {
        if (is_null($id)) {
            $user = new User;
            $user->first_name = $collection['first_name'];
            $user->last_name = $collection['last_name'];
            $user->email = $collection['email'];
            $user->password = Hash::make('password');
            return $user->save();
        }
        $user = User::find($id);
        $user->first_name = $collection['first_name'];
        $user->last_name = $collection['last_name'];
        $user->email = $collection['email'];
        return $user->save();
    }

    public function deleteUser($id)
    {
        return User::find($id)->delete();
    }

    public function model()
    {
        return User::class;
    }
}
