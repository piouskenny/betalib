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
                <div class="col-md-6">
                    <div class="result">
                        @if (Session::get('success'))
                            <div class="alert alert-success">
                                {{ Session::get('success') }}
                            </div>
                        @endif
                        @if (Session::get('failed'))
                            <div class="alert alert-danger">
                                {{ Session::get('failed') }}
                            </div>
                        @endif
                    </div>
                    <form action="{{ route('bl-admin_store_file') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('post')

                        <div class="form-group my-3">
                            <input type="text" name="book_id" id="" value="{{ $book->id }}" hidden
                                class="form-control">
                        </div>

                        <div class="form-group my-3">
                            <input type="text" name="book_title" id="" value="{{ $book->book_title }}" hidden
                                class="form-control">
                        </div>

                        <div class="input-group mt-2 mb-3">
                            <input type="file" name="book_file" class="form-control" id="">
                        </div>


                        <div class="form-group d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary w-50">Add Book File</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection
