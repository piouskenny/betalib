@extends('admin.layout.app')
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row d-flex justify-content-center">
                <div class="col-md-6 shadow rounded">
                    <form action="{{ route('bl-admin_store_book') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('post')

                        <div class="form-group my-4">
                            <label for="cover">Book Title</label>
                            <input type="text" name="book_title" placeholder="Title Here" id=""
                                class="form-control my-2">
                        </div>
                        <div class="form-group my-4">
                            <label for="author">Book Author</label>
                            <input type="text" name="book_author" placeholder="Author" id=""
                                class="form-control my-2">
                        </div>
                        <div class="form-group my-4">
                            <label for="cover">Book Cover</label>
                            <input type="file" name="book_cover" placeholder="Book COver" id=""
                                class="form-control my-2">
                        </div>
                        <div class="form-group my-4">
                            <label for="cover">Date Written</label>
                            <input type="date" name="date_written"  id=""
                                class="form-control my-2">
                        </div>
                        <div class="form-group my-4">
                            <label for="cover">Description</label>
                            <textarea name="description" id="editor" cols="80" rows="10">
                        </textarea>
                        </div>
                        <div class="form-group text-center my-4">
                                <button type="submit" class="btn btn-primary w-100">
                                    Add Book
                                </button>
                        </div>
                    </form>
                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection
