<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use App\Http\Requests\UserCheckRequest;
use App\Http\Requests\UserSignupRequest;
use App\Models\User;
use App\Models\Profile;
use App\Models\Review;
use App\Models\Book;
use App\Models\BookFile;
// use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use App\Services\UserControllerServices;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public  $UserControllerServices;

    public function index()
    {
        $user = User::where('id', '=', session('LoggedUser'))->first();

        $books = Book::all();

        return view('index', compact('books'))->with('user', $user);
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
    public function store(UserSignupRequest $request)
    {
        $request->validated();

        $this->UserControllerServices = new UserControllerServices;
        $this->UserControllerServices->signupUser($request);

        return redirect('/login')->with('success', 'create account successfully');
    }


    public function check(UserCheckRequest $request)
    {
        $request->validated();
        $this->UserControllerServices = new  UserControllerServices;
        $user =  $this->UserControllerServices->loginUser($request);



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


        $user = User::where('id', '=', session('LoggedUser'))->first();


        return view('users.profile')->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update_profile_details(UpdateProfileRequest $request, User $user)
    {
        $id = session('LoggedUser');

        $request->validated();


        $this->UserControllerServices = new UserControllerServices;

        $this->UserControllerServices->UpdateUserProfile($request, $id);

        return redirect('/profile');
    }

    public function show_file($id)
    {
        $user = User::where('id', session('LoggedUser'))->first();


        $book = Book::where('id', $id)->first();
        $book_file = BookFile::where('book_id', $id)->first();

        // dd($book, $book_file);

        return view(
            "users.show",
            [
                'user' => $user,
                'book' => $book,
                'book_file' => $book_file,
            ]
        );
    }

    public function description($id)
    {
        if (!session()->has('LoggedUser')) {
            return redirect('login');
        } elseif (session()->has('LoggedUser')) {
            $user = User::where('id', '=', session('LoggedUser'))->first();
            $data = ['LoggedUserInfo' => $user,];
        }

        $book_info = Book::all()->where('id', '=', $id);

        $review = Review::all();

        return view("users.description", $data, compact('book_info', 'review'));
    }

    public function add_review($id)
    {
        if (!session()->has('LoggedUser')) {
            return redirect('login');
        } elseif (session()->has('LoggedUser')) {
            $user = User::where('id', '=', session('LoggedUser'))->first();
            $data = ['LoggedUserInfo' => $user,];
        }


        $user_info_all = User::all()->where('id', '=', session('LoggedUser'));

        // $user_info = ['info' => $user_info_all];

        $book = Book::all()->where('id', '=', $id);

        // $book_info = ['bookInfo' => $book];

        return view("users.add_review", $data, compact('user_info_all', 'book'));
    }

    public function upload_review(Request $request)
    {
        // dd($request->all());
        $request->validate(
            [
                'review' => 'required|string',
                'user_id' => 'unique:reviews',
                'user_username' => 'unique:reviews'
            ],
        );

        $review = Review::create([
            'book_title' => $request->book_title,
            'author' => $request->book_author,
            'user_id' => $request->user_id,
            'user_username' => $request->username,
            'review' => $request->review,
        ]);

        return back()->with("success", "Review Uploaded Successfully go back to check your review");
    }

    public function download($id)
    {
        $book_file = BookFile::all()->where('book_id', '=', $id);


        foreach ($book_file as $file) {
            $title = $file['book_title'];
        }

        foreach ($book_file as $file) {
            $file = $file['book_file'];

            $file_path = public_path('books/' . $file);
        }

        return Response::download($file_path, $title . ".pdf", ['Content-Type: Document/pdf']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        if (session()->has('LoggedUser')) {
            session()->pull('LoggedUser');
            return redirect('/login');
        }
    }
}
