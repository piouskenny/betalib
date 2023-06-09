<?php

namespace App\Services;

use App\Models\Admin;
use App\Models\Book;
use App\Models\BookFile;
use App\Models\User;
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

    public function indexService()
    {
        $output = [];

        $admin = Admin::where('id', '=', session('LoggedUser'))->first();

        $users = User::all()->count('username');

        $books = Book::all()->count('book_title');

        $output = [$admin, $users, $books];

        return $output;
    }


    public function store_book_service($request)
    {

        $bookCoverName = time() . '-' . $request->book_title . '.' . $request->book_cover->extension();

        $request->book_cover->move(public_path('book_cover'), $bookCoverName);


        $book = Book::create([
            'book_title' => $request->book_title,
            'book_author' => $request->book_author,
            'book_cover' => $bookCoverName,
            'date_written' => $request->date_written,
            'description' => $request->description,
        ]);
    }

    public function store_service($request)
    {
        Admin::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
    }

    public function store_file_service($request)
    {

        $filename = time() . '-' . $request->book_title . '.' . $request->book_file->extension();
        $file_info = $request->book_file->getSize() / 1000000;
        $filesize = round($file_info, 1) . " MB";

        $request->book_file->move(public_path('books/'), $filename);

        BookFile::create([
            'book_id' => $request->book_id,
            'book_title' => $request->book_title,
            'book_file' => $filename,
            'book_size' => $filesize,
        ]);
    }
}
