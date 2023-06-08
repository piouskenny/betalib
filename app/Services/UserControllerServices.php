<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserControllerServices
{
    public function signupUser($request)
    {
        $user = User::create([
            'username' => $request->username,
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'country' => $request->country,
            'password' => Hash::make($request->password)
        ]);
    }

    public function loginUser($request)
    {
        $user = User::where('email', '=', $request->email)->first();
        return $user;
    }
}
