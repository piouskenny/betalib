@extends('layout.app')

@section('content')
    <!-- content -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row bg-white shadow-sm hero-lib d-flex justify-content-center">
                @php
                    $review = [];
                @endphp
                @forelse ( $review as $none )
                    
                @empty
                    <div class="alert alert-danger my-5">
                        NO REVIEW ADDED FOR THIS BOOK YET
                    </div>
                @endforelse
            </div>
        </div>
    </div>
    </div>

    </div>
@endsection
