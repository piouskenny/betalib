@extends('layout.app')
@section('content')
    <!-- content -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row bg-white shadow-sm hero-lib  d-flex justify-content-center">
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
                    <form action="{{ route('upload_review') }}" method="post">
                        <span class="text-danger my-2">
                            @error('user_id')
                                {{ $message }}
                            @enderror
                        </span>
                        @csrf
                        @method('post')
                        @forelse ($user_info_all as $one)
                            <div class="form-group my-5">
                                <input type="text" hidden name="username" id="" class="form-control"
                                    value="{{ $one->username }}">
                            </div>
                            <div class="form-group my-5">
                                <input type="number" hidden name="user_id" id="" class="form-control"
                                    value="{{ $one->id }}">
                            </div>
                        @empty
                        @endforelse
                        <div class="form-group mt-5">
                            <div class="row">
                                @forelse ($book as $one)
                                    <div class="col-6">
                                        <input type="text" hidden name="book_author" id="" class="form-control"
                                            value="{{ $one->book_author }}">
                                    </div>
                                    <div class="col-6">
                                        <input type="text" hidden name="book_title" id="" class="form-control"
                                            value="{{ $one->book_title }}">
                                    </div>
                                @empty
                                @endforelse
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-group my-4">
                                <label for="cover">Review</label>
                                <textarea name="review" id="editor" cols="80" rows="10"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary w-100">Add review</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
    </div>

    </div>
@endsection
