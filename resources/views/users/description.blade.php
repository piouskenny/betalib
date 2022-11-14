@extends('layout.app')
@section('content')
    <!-- content -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row bg-white shadow-sm hero-lib  d-flex justify-content-center">
                <div class="col-12 text-center">
                    @php
                        $review = [];
                    @endphp
                    @forelse ($review as $none)
                    @empty
                        <div class="alert alert-danger my-5 w-100 text-center">
                            NO REVIEW ADDED FOR THIS BOOK YET
                        </div>
                    @endforelse

                    @forelse ($book_info as $info)
                        <a href="{{ route('add_review', $info->id) }}" class="btn btn-dark rounded my-3">Add
                            Review</a>
                    @empty
                    @endforelse

                </div>
            </div>

        </div>
    </div>
    </div>

    </div>
@endsection
