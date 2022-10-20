<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!session()->has('LoggedUser')) {
            return redirect('login');
        } elseif(session()->has('LoggedUser')) {
            $user = User::where('id', '=', session('LoggedUser'))->first();
            $data = ['LoggedUserInfo' => $user,];
        }
        return view('index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.signup');
    }


    public function login()
    {
        return view('users.login');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|unique:users',
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'email' => 'required|email|unique:users',
            'country' => 'required|string',
            'password' => 'required|min:7|'
        ]);


        $user = User::create([
            'username' => $request->username,
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'country' => $request->country,
            'password' => Hash::make($request->password)
        ]);



        return redirect('/login')->with('success', 'create account successfully');

        // dd(Hash::make($request->password));
        // dd($request->all());
    }


    public function check(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:7|'
        ]);

        $user = User::where('email', '=', $request->email)->first();


        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $request->session()->put('LoggedUser', $user->id);

                return redirect('/');
            } else {
                return back()->with('failed', 'wrong Password');
            }
        } else {
            return back()->with('failed', 'No Account Found for ' . $request->email);
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        if(!session()->has('LoggedUser')) {
            return redirect('login');
        } elseif(session()->has('LoggedUser')) {
            $user = User::where('id', '=', session('LoggedUser'))->first();
            $data = ['LoggedUserInfo' => $user];
        }

        $user_info = Profile::where('id', '=', session('LoggedUser'))->first();
        $user_info_data = ['information' => $user_info];

        return view('users.profile', $data, $user_info_data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function updateProfile()
    {
        if(!session()->has('LoggedUser')) {
            return redirect('login');
        } elseif(session()->has('LoggedUser')) {
            $user = User::where('id', '=', session('LoggedUser'))->first();
            $data = ['LoggedUserInfo' => $user,];
        }

        return view('users.update_profile', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update_profile_details(Request $request, User $user)
    {
        $id = session('LoggedUser');

        $request->validate([
            "profile_img" => 'mimes:jpg,png,jpeg|max:6048',
            "about_me" => 'string',
            "facebook" => 'string',
            "twitter" => 'string',
            "instagram" => 'string',
        ]);


        $newImageName = time() . '-' . $request->instagram . '.' . $request->profile_img->extension();

        $request->profile_img->move(public_path('images/profile_pics'), $newImageName);


        $profile = Profile::create([
            'users_id' => $id,
            'image_path' => $newImageName,
            'about' => $request->about_me,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'instagram' => $request->instagram,
        ]);

        return redirect('/profile');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        if(session()->has('LoggedUser')) {
            session()->pull('LoggedUser');
            return redirect('/login');
        }
    }
}
