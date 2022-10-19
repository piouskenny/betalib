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
                    <img src="{{ asset('images/hero-reader.png')}}" class="hero-image" alt="">
                </div>
            </div>
            <h1 class=" row text-primary display-3 mt-5">Library</h1>
            <div class="row mt-2">

                <div class="col-md-3 my-3">
                    <img src="{{ asset('resourses/book 1.JPG ')  }}" class="w-75 h-75 rounded" alt="">
                    <h3 class="mt-2">Book Title</h3>
                    <small>Author: Name</small>
                </div>
                <div class="col-md-3 my-3">
                    <img src="{{ asset('resourses/book 2.JPG ')  }}" class="w-75 h-75 rounded" alt="">
                    <h3 class="mt-2">Book Title</h3>
                    <small>Author: Name</small>
                </div>
                <div class="col-md-3 my-3">
                    <img src="{{ asset('resourses/book 3.JPG ')  }}" class="w-75 h-75 rounded" alt="">
                    <h3 class="mt-2">Book Title</h3>
                    <small>Author: Name</small>
                </div>
                <div class="col-md-3 my-3">
                    <img src="{{ asset('resourses/book 4.JPG ')  }}" class="w-75 h-75 rounded" alt="">
                    <h3 class="mt-2">Book Title</h3>
                    <small>Author: Name</small>
                </div>
                <div class="col-md-3 my-3">
                    <img src="{{ asset('resourses/book 5.JPG ')  }}" class="w-75 h-75 rounded" alt="">
                    <h3 class="mt-2">Book Title</h3>
                    <small>Author: Name</small>
                </div>
                <div class="col-md-3 my-3">
                    <img src="{{ asset('resourses/book 6.PNG ')  }}" class="w-75 h-75 rounded" alt="">
                    <h3 class="mt-2">Book Title</h3>
                    <small>Author: Name</small>
                </div>
                <div class="col-md-3 my-3">
                    <img src="{{ asset('resourses/book 7.JPG ')  }}" class="w-75 h-75 rounded" alt="">
                    <h3 class="mt-2">Book Title</h3>
                    <small>Author: Name</small>
                </div>
                <div class="col-md-3 my-3">
                    <img src="{{ asset('resourses/book 8.JPG ')  }}" class="w-75 h-75 rounded" alt="">
                    <h3 class="mt-2">Book Title</h3>
                    <small>Author: Name</small>
                </div>
            </div>
        </div>
    </div>
    </div>

    </div>
@endsection
