@extends('layout.app')
@section('content')
    <!-- content -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row bg-white shadow-sm hero-lib  d-flex justify-content-center">
                <div class="col-md-6">
                    <form action="" method="post">
                        @csrf
                        @method('post')
                        @forelse ($user_info_all as $one)
                            <div class="form-group my-5">
                                <input type="text" name="username" id="" class="form-control"
                                    value="{{ $one->username }}" disabled>
                            </div>
                        @empty
                        @endforelse
                        <div class="form-group mt-5">
                            <div class="row">
                                @forelse ($book as $one)
                                    <div class="col-6">
                                        <input type="text" name="author" id="" class="form-control" disabled value="{{ $one->book_author }}">
                                    </div>
                                    <div class="col-6">
                                        <input type="text" name="author" id="" class="form-control" disabled value="{{ $one->book_title }}">
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
