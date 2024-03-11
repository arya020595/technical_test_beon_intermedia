<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function getAllUsers()
    {
        return User::all();
    }

    public function getUserById($id)
    {
        return User::find($id);
    }

    public function createUser($data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function updateUser($user, $data)
    {
        $user->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        return $user;
    }

    public function deleteUser($user)
    {
        $user->delete();
    }
}
