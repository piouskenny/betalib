@include('layout.header_links')

<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth px-0">
            <div class="row w-100 mx-0">
                <div class="col-lg-4 mx-auto">
                    <div class="auth-form-light text-left py-5 px-4 px-sm-5 rounded">
                        <div class="brand-logo">
                            <h1 class="text-primary h2 text-center text-uppercase">BetaLib</h1>
                        </div>
                        <h6 class="font-weight-light text-center text-upper">Sign up and join the readers community.</h6>
                        <form class="pt-3" method="POST" action="{{ route('store') }}">
                            @csrf
                            @method('post')

                            <div class="form-group">
                                <input type="text" class="form-control form-control-sm" id="exampleInputUsername1" 
                                    placeholder="Username" name="username" value="{{ old('username') }}">
                                <span class="text-danger my-2">
                                    @error('username')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-6">
                                        <input type="text" class="form-control form-control-sm"
                                            id="exampleInputUsername1" placeholder="First Name" name="firstname"  value="{{ old('firstname') }}">
                                        <span class="text-danger my-2">
                                            @error('firstname')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="col-6">
                                        <input type="text" class="form-control form-control-sm"
                                            id="exampleInputUsername1" placeholder="Last Name"name="lastname"  value="{{ old('lastname') }}">
                                        <span class="text-danger my-2">
                                            @error('lastname')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control form-control-sm" id="exampleInputEmail1"
                                    placeholder="Email" name="email"  value="{{ old('email') }}">
                                <span class="text-danger my-2">
                                    @error('email')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="form-group">
                                <select class="form-control form-control-sm" id="exampleFormControlSelect2"
                                    name="country">
                                    <option hidden value="">Country</option>
                                    <option value="Nigeria">Nigeria</option>
                                    <option value="Ghana">Ghana</option>
                                    <option value="United State">United States of America</option>
                                    <option value="United Kingdom">United Kingdom</option>
                                    <option value="India">India</option>
                                    <option value="Germany">Germany</option>
                                    <option value="Argentina">Argentina</option>
                                </select>
                                <span class="text-danger my-2">
                                    @error('country')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control form-control-sm" id="exampleInputPassword1"
                                    placeholder="Password" name="password">
                                <span class="text-danger my-2">
                                    @error('password')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="mb-4">
                                <div class="form-check">
                                    <label class="form-check-label text-muted">
                                        <input type="checkbox" class="form-check-input text-center">
                                        I agree to all Terms & Conditions
                                    </label>
                                </div>
                            </div>
                            <div class="mt-3">
                                <button type="submit"
                                    class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">SIGN
                                    UP</button>
                            </div>
                            <div class="text-center mt-4 font-weight-light">
                                Already have an account? <a href="{{ route('login') }}" class="text-primary">Login</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
    </div>
