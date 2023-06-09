<?php

namespace App\Services;

use Illuminate\Support\Facades\Hash;

class AdminControllerServices
{
    public function AdminLoginCheck($admin, $request)
    {
        if ($admin) {
            if (Hash::check($request->password, $admin->password)) {
                $request->session()->put('LoggedUser', $admin->id);
            } else {
                return back()->with('failed', 'wrong Password');
            }
        } else {
            return back()->with('failed', 'You are not admin' . $request->username);
        }
    }
}
