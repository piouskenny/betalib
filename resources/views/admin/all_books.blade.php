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
                @forelse ($all_books as $books)
                    <div class="col-md-3 col-6 my-3">
                        <img src="{{ asset('book_cover/'.$books['book_cover'])}}" class="w-75 h-75 rounded rounded-5" alt="">
                        <h3 class="mt-2">{{ $books['book_title'] }}</h3>
                        <small>Author: {{ $books['book_author'] }}</small>
                    </div>
                @empty
                <div class="alert alert-warning">
                    No Book Added Yet.. <a href="{{ route('bl-admin_add_book') }}">Click here to add Book</a>
                </div>
                @endforelse
            </div>
        </section>

    </main><!-- End #main -->
@endsection
