@extends('layout.app')
@section('content')
    <!-- content -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row bg-white shadow-sm hero-lib  d-flex justify-content-center">
                <div class="col-12 text-center">

                    {{-- @php
                            dd($book);
                        @endphp --}}

                    <div class="row justify-content-center">
                        <div class="text-center my-3 col-4">
                            <img src="{{ asset('book_cover/' . $book->book_cover) }}" class="w-50 h-100 rounded rounded-5"
                                alt="">
                        </div>
                    </div>



                    <h2 class="text-primary text-uppercase text-center h4">{{ $book->book_title }}</h2>
                    <p class="text-center text-uppercase text-info">
                        Author: <b>{{ $book->book_author }}</b>
                    </p>

                    <h4 class="mt-4">Description:</h4>
                    <h1>
                        @php
                            echo htmlspecialchars_decode($book->description);
                        @endphp

                    </h1>


                    @forelse ($reviews as $review)
                        <div class="shadow my-3 pb-4">

                            <p class="pt-4">
                                @php
                                    echo htmlspecialchars_decode($review['review']);
                                @endphp
                            </p>

                            <p class="h5">BY:
                                @if ($review->user->username === $user->username)
                                    Me
                                @else
                                    {{ $review->user->username }}
                                @endif
                            </p>

                        </div>
                    @empty
                        <div class="alert alert-danger my-5 w-100 text-center">
                            NO REVIEW ADDED FOR THIS BOOK YET
                        </div>
                    @endforelse

                    {{ $reviews->links() }}

                    @if ($user->review)
                        <p class="alert-warning">
                            You've added your own review
                        </p>
                    @else
                        <a href="{{ route('add_review', $book->id) }}" class="btn btn-primary">
                            Add your Own Review
                        </a>
                    @endif


                </div>
            </div>

        </div>
    </div>
    </div>

    </div>
@endsection
