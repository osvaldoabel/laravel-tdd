<?php

namespace App\Services;

use App\User;
use App\UserProfile;


class UserService
{
    public function create($data)
    {
        $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'email' => $data['email'],
                'password' => bcrypt($data['password'])
            ]);

        UserProfile::create([
            'user_id' => $user->id,
            'address' => $data['address'],
            'state' => $data['state'],
            'zip' => $data['zip']
        ]);

        return $user->id;
    }

}