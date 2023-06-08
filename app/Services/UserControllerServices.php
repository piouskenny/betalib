<?php

namespace App\Services;

use App\Models\Profile;
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



    public function UpdateUserProfile($request, $id)
    {
        $newImageName = time() . '-' . $request->instagram . '.' . $request->profile_img->extension();

        $request->profile_img->move(public_path('images/profile_pics'), $newImageName);

        Profile::create([
            'user_id' => $id,
            'image_path' => $newImageName,
            'about' => $request->about,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'instagram' => $request->instagram,
        ]);
    }
}
