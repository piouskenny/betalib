<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminLoginRequest;
use App\Http\Requests\AdminStoreRequest;
use App\Http\Requests\storeBookRequest;
use App\Models\Admin;
use App\Models\User;
use App\Models\Book;
use App\Models\BookFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Services\AdminControllerService;
use App\Services\AdminControllerServices;

class AdminController extends Controller
{
    public $adminControllerService;

    public function index()
    {
        $this->adminControllerService = new AdminControllerServices;
        $output =  $this->adminControllerService->indexService();

        return view(
            'admin.index',
            [
                'admin' => $output[0],
                'users' => $output[1],
                'books' => $output[2]
            ]
        );
    }

    public function add_book()
    {
        $admin = Admin::where('id', '=', session('LoggedUser'))->first();
        return view('admin.add_book')->with('admin', $admin);
    }



    public function all_books()
    {

        $admin = Admin::where('id', '=', session('LoggedUser'))->first();

        $all_books = Book::all();

        return view(
            'admin.all_books',
            [
                'admin' => $admin,
                'all_books' => $all_books
            ]
        );
    }

    public function store_book(storeBookRequest $request)
    {

        $request->validated();

        $this->adminControllerService = new AdminControllerServices;
        $this->adminControllerService->store_book_service($request);

        return redirect('/bl-admin/add_book')->with('success', 'Book Added Successfully');
    }

    public function create()
    {
        return view('admin.signup');
    }


    public function login()
    {
        return view('admin.login');
    }


    public function store(AdminStoreRequest $request)
    {
        $request->validated();
        $this->adminControllerService = new AdminControllerServices;
        $this->adminControllerService->store_service($request);

        return redirect('/bl-admin/login')->with('success', 'create account successfully');
    }


    public function check(AdminLoginRequest $request)
    {
        $request->validated();

        $admin = Admin::where('username', '=', $request->username)->first();

        $this->adminControllerService = new AdminControllerServices;
        $this->adminControllerService->AdminLoginCheck($admin, $request);

        return redirect('/bl-admin');
    }


    public function add_file($id)
    {

        $admin = Admin::where('id', '=', session('LoggedUser'))->first();

        $book = Book::where('id', '=', $id)->first();

        return view(
            "admin.add_file",
            [
                'admin' => $admin,
                'book' => $book
            ]
        );
    }

    public function store_file(Request $request)
    {
        $request->validate([
            "book_file" => 'mimes:docx,pdf,epud|required',
        ]);

        $this->adminControllerService = new AdminControllerServices;
        $this->adminControllerService->store_file_service($request);

        return back()->with('success', 'Book File added successfully');
    }

    public function logout()
    {
        if (session()->has('LoggedUser')) {
            session()->pull('LoggedUser');
            return redirect('bl-admin/login');
        }
    }
}
