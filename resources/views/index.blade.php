@extends('layout.app')

@section('content')
    <!-- content -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row bg-white shadow-sm hero-lib ">
                <div class="col-6 p-5">
                    <h1 class="my-3">
                        <span class="text-primary brand-name">BetaLib</span>
                        <span class="slogan my-3">Read, Share, Review and Learn</span>
                    </h1>

                    <div class="row my-4">
                        <button class="btn btn-primary mx-2 my-2">
                            Start Reading
                        </button>

                        <button class="btn btn-light border border-1 text-primary mx-2 my-2">
                            Write Review
                        </button>
                    </div>
                </div>
                <div class="col-6 my-0">
                    <img src="{{ asset('images/hero-reader.png') }}" class="hero-image" alt="">
                </div>
            </div>
            <h1 class=" row text-primary display-3 mt-5">Library</h1>


            <div class="row mt-2">
                @forelse ($books as $book)
                    <div class="col-md-3 col-6 my-3">
                        <a href="{{ route('show_file', $book['id']) }}" class="nav-link text-dark">
                            <img src="{{ asset('book_cover/' . $book['book_cover']) }}" class="w-75 h-75 rounded rounded-5"
                                alt="">
                            <h5 class="mt-2">{{ $book['book_title'] }}</h5>
                            <small>Author: {{ $book['book_author'] }}</small>
                        </a>
                    </div>
                @empty
                    <div class="alert alert-danger">
                        No Book Adde Yet
                    </div>
                @endforelse

            </div>
        </div>
    </div>
    </div>

    </div>
@endsection
