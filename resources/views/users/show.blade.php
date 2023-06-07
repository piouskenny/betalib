@extends('layout.app')

@section('content')
    <!-- content -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row bg-white shadow-sm hero-lib d-flex justify-content-center">
                <div class="col-md-5">
                    <div class="text-center my-3">
                        <img src="{{ asset('book_cover/' . $book->book_cover) }}" class="w-50 h-50 rounded rounded-5"
                            alt="">
                    </div>

                    <h2 class="text-primary text-uppercase text-center h4">{{ $book->book_title }}</h2>
                    <p class="text-center text-uppercase text-info">
                        <b>{{ $book->book_author }}</b>
                    </p>

                    <h4 class="mt-4">Description:</h4>
                    <h1>
                        @php
                            echo htmlspecialchars_decode($book->description);
                        @endphp

                    </h1>

                    <small><b> Date Published: {{ $book->date_written }}</b></small>
                    <a href="{{ route('description', $book->id) }}"
                        class="d-block my-3 text-info border border-3 rounded nav-link mx-0">See / Write Review</a>

                    @forelse ($book_file as $file)
                        <p class="text-danger mt-3">File Size: {{ $file['book_size'] }} </p>

                        <a href="{{ route('download', $file['book_id']) }}" class="btn btn-primary w-100 text-center">
                            Download File
                        </a>
                        {{-- {{ $file['book_file'] }} --}}
                    @empty
                        <div class="alert alert-warning my-4">
                            Sorry, No File Was Attached to This Book, Check back later
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
    </div>

    </div>
@endsection
