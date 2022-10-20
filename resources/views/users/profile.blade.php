@extends('layout.app')

@section('content')
    @if (!$information)
        @php
            class Details 
            {
                public $image_path = "face1.jpg";
                public $about;
                public $facebook;
                public $twitter;
                public $instagram;
            }
            
            $information = new Details();
        @endphp
    @endif
    <!-- content -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="hero_profile">
                    <div class="profile_image">

                        <img src="{{ asset('images/profile_pics/' . $information->image_path) }}"
                            class="img_profile border border-light border-5" alt="">

                        <h1 class="text-light h4 mt-5 mx-3">{{ $LoggedUserInfo->firstname }} {{ $LoggedUserInfo->lastname }}
                            <span class="text-mutted d-block h6 mt-1">{{ $LoggedUserInfo->username }}</span>
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
                        <p class="mt-3">{{ $information->about }}</p class="mt-3">

                        <div class="common_info mt-4">
                            <p> <b>Username: {{ $LoggedUserInfo->username }}</b></p>
                            <p> <b>Email: {{ $LoggedUserInfo->email }}</b></p>
                            <p> <b>Country: {{ $LoggedUserInfo->country }}</b></p>
                        </div>
                    </div>

                    <div class="about  mt-3 rounded shadow-sm p-3">
                        <h5 class="my-3">
                            <b>Social</b>
                        </h5>

                        <div class="common_info mt-4">
                            <p> <b> <i class="ti-facebook mr-2 text-info"></i>{{ $information->facebook }}</b></p>
                            <p> <b><i class="ti-twitter mr-2 text-primary"></i>{{ $information->twitter }}</b></b></p>
                            <p> <b><i class="ti-instagram mr-2 text-danger"></i>{{ $information->instagram }}</b></b></p>
                        </div>
                    </div>

                    <a href="{{ route('update_profile') }}" class="btn btn-info my-3 w-50">Update Profile</a>
                </div>

                <div class="col-md-7 mt-3">

                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
