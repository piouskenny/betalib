@extends('layout.app')

@section('content')
    <!-- content -->
    <div class="main-panel">
        <div class="content-wrapper">
            @if ($user->profile)
                <div class="row">
                    <div class="hero_profile">
                        <div class="profile_image">

                            <img src="{{ asset('images/profile_pics/' . $user->profile->image_path) }}"
                                class="img_profile border border-light border-5" alt="">

                            <h1 class="text-light h4 mt-5 mx-3">{{ $user->profile->firstname }}
                                {{ $user->profile->lastname }}
                                <span class="text-mutted d-block h6 mt-1">{{ $user->profile->username }}</span>
                            </h1>
                        </div>
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col-md-5">
                        <div class="about  mt-3 rounded shadow-sm p-3">
                            <h5 class="my-3">
                                <b>About Me</b>
                            </h5>
                            <p class="mt-3">{{ $user->profile->about }}</p class="mt-3">

                            <div class="common_info mt-4">
                                <p> <b>Username: {{ $user->username }}</b></p>
                                <p> <b>Email: {{ $user->email }}</b></p>
                                <p> <b>Country: {{ $user->country }}</b></p>
                            </div>
                        </div>

                        <div class="about  mt-3 rounded shadow-sm p-3">
                            <h5 class="my-3">
                                <b>Social</b>
                            </h5>

                            <div class="common_info mt-4">
                                <p> <b> <i class="ti-facebook mr-2 text-info"></i>{{ $user->profile->facebook }}</b></p>
                                <p> <b><i class="ti-twitter mr-2 text-primary"></i>{{ $user->profile->twitter }}</b></b></p>
                                <p> <b><i class="ti-instagram mr-2 text-danger"></i>{{ $user->profile->instagram }}</b></b>
                                </p>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-7 mt-3">
                    </div>
                </div>
            @else
                <div>
                    <div class="d-flex justify-content-center">
                        <div>
                            <div class="alert alert-warning text-center w-100">
                                Sorry You can't view this page, cause your profile is empty
                            </div>

                            <div class="mt-5">
                                <h1 class="text-primary h3  text-center">
                                    Update Profile
                                </h1>

                                <div class="row d-flex justify-content-center">
                                    <div class="p-4 shadow-lg rounded">
                                        <form action="{{ route('update_profile_details') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('post')

                                            <div class="form-group my-3">
                                                <label for="profile Image">Upload Profile Image</label>
                                                <input type="file" name="profile_img" id=""
                                                    class="form-control">
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
            @endif
        </div>
    </div>



    </div>
    </div>
@endsection
