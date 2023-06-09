<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use App\Models\Book;
use App\Models\BookFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Services\AdminControllerService;


class AdminController extends Controller
{
    public $adminControllerService;


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!session()->has('LoggedUser')) {
            return redirect('/bl-admin/login');
        } elseif (session()->has('LoggedUser')) {
            $user = Admin::where('id', '=', session('LoggedUser'))->first();
            $data = ['LoggedUserInfo' => $user,];
        }

        $users = User::all()->count('username');

        $book = Book::all()->count('book_title');

        return view('admin.index', $data, compact('users', 'book'));
    }

    public function add_book()
    {
        if (!session()->has('LoggedUser')) {
            return redirect('/bl-admin/login');
        } elseif (session()->has('LoggedUser')) {
            $user = Admin::where('id', '=', session('LoggedUser'))->first();
            $data = ['LoggedUserInfo' => $user,];
        }

        return view('admin.add_book', $data);
    }



    public function all_books()
    {
        if (!session()->has('LoggedUser')) {
            return redirect('/bl-admin/login');
        } elseif (session()->has('LoggedUser')) {
            $user = Admin::where('id', '=', session('LoggedUser'))->first();
            $data = ['LoggedUserInfo' => $user,];
        }


        $all_books = Book::all();

        return view('admin.all_books', $data, compact('all_books'));
    }

    public function store_book(Request $request)
    {

        $request->validate([
            'book_title' => 'required',
            'book_author' => 'required|string',
            'book_cover' => 'required|mimes:jpg,png,jpeg|max:4000',
            'date_written' => 'required',
            'description' => 'required',
        ]);

        $bookCoverName = time() . '-' . $request->book_title . '.' . $request->book_cover->extension();

        $request->book_cover->move(public_path('book_cover'), $bookCoverName);


        $book = Book::create([
            'book_title' => $request->book_title,
            'book_author' => $request->book_author,
            'book_cover' => $bookCoverName,
            'date_written' => $request->date_written,
            'description' => $request->description,
        ]);

        return redirect('/bl-admin/add_book')->with('success', 'Book Added Successfully');
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.signup');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('admin.login');
    }


    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|unique:admins',
            'email' => 'required|email|unique:admins',
            'password' => 'required|min:7|'
        ]);

        $admin = Admin::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return redirect('/bl-admin/login')->with('success', 'create account successfully');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function check(Request $request)
    {
        
        $request->validate([
            'username' => 'required',
            'password' => 'required|min:7|'
        ]);

        $admin = Admin::where('username', '=', $request->username)->first();


        if ($admin) {
            if (Hash::check($request->password, $admin->password)) {
                $request->session()->put('LoggedUser', $admin->id);
                return redirect('/bl-admin');
            } else {
                return back()->with('failed', 'wrong Password');
            }
        } else {
            return back()->with('failed', 'You are not admin' . $request->username);
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function add_file($id)
    {

        if (!session()->has('LoggedUser')) {
            return redirect('/bl-admin/login');
        } elseif (session()->has('LoggedUser')) {
            $user = Admin::where('id', '=', session('LoggedUser'))->first();
            $data = ['LoggedUserInfo' => $user,];
        }

        $book = Book::all()->where('id', '=', $id);

        // dd($book['id']);
        return view("admin.add_file", $data, compact('book'));
    }

    public function store_file(Request $request)
    {
        $request->validate([
            "book_file" => 'mimes:docx,pdf,epud|required',
        ]);


        $filename = time() . '-' . $request->book_title . '.' . $request->book_file->extension();
        $file_info = $request->book_file->getSize() / 1000000;
        $filesize = round($file_info, 1) . " MB";

        $request->book_file->move(public_path('books/'), $filename);

        $book_file = BookFile::create([
            'book_id' => $request->book_id,
            'book_title' => $request->book_title,
            'book_file' => $filename,
            'book_size' => $filesize,
        ]);

        return back()->with('success', 'Book File added successfully');
        
        // dd($filename, $request->book_id, $request->book_title, $filesize);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
    }

    public function logout()
    {
        if (session()->has('LoggedUser')) {
            session()->pull('LoggedUser');
            return redirect('bl-admin/login');
        }
    }
}
