@extends('layout.app')

@section('content')
    <!-- content -->
    <div class="main-panel">
        <div class="content-wrapper">
            <h5 class="text-primary">Update Profile</h5>
            <div class="row d-flex justify-content-center">
                <div class="col-md-4 p-4 shadow-lg rounded">
                    <form action="{{ route('update_profile_details') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('post')

                        <div class="form-group my-3">
                            <label for="profile Image">Upload Profile Image</label>
                            <input type="file" name="profile_img" id="" class="form-control">
                            <span class="text-danger">
                                @error('profile_img')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="form-group my-3">
                            <label for="about">About Me</label>
                            <textarea type="file" name="about" id="" class="form-control"> 

                            </textarea>
                            <span class="text-danger">
                                @error('about_me')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="form-group my-3">
                            <label for="facebook">
                                <i class="ti-facebook mr-2 text-info"></i> FaceBook
                            </label>

                            <input type="text" name="facebook" class="form-control" id="">
                            <span class="text-danger">
                                @error('facebook')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="form-group my-3">
                            <label for="twitter">
                                <i class="ti-twitter mr-2 text-primary"></i> Twitter
                            </label>

                            <input type="text" name="twitter" class="form-control" id="">
                            <span class="text-danger">
                                @error('twitter')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="form-group my-3">
                            <label for="instagram">
                                <i class="ti-instagram mr-2 text-danger"></i> Instagram
                            </label>

                            <input type="text" name="instagram" class="form-control" id="">
                            <span class="text-danger">
                                @error('instagram')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="form-group my-3 text-center ">
                            <button type="submit" class="btn btn-primary w-100">Update Profile</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
