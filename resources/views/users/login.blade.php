@include('layout.header_links')
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth px-0">
            <div class="row w-100 mx-0">
                <div class="col-lg-4 mx-auto">
                    <div class="auth-form-light text-left py-5 px-4 px-sm-5 rounded">
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
                        <div class="brand-logo">
                            <h1 class="text-primary h2 text-center text-uppercase">BetaLib</h1>
                        </div>
                        <form class="pt-3" action="{{ route('check') }}" method="post">
                            @csrf
                            @method('post')

                            <div class="form-group">
                                <input type="email" class="form-control form-control-lg" id="exampleInputEmail1"
                                    placeholder="email" name="email" value="{{ old('username') }}">
                                    <span class="text-danger my-2">
                                      @error('email')
                                          {{ $message }}
                                      @enderror
                                  </span>
                            </div>

                            <div class="form-group">
                                <input type="password" class="form-control form-control-lg" id="exampleInputPassword1"
                                    placeholder="Password" name="password">
                                    <span class="text-danger my-2">
                                      @error('password')
                                          {{ $message }}
                                      @enderror
                                  </span>
                            </div>
                            <div class="mt-3">
                                <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">SIGN
                                    IN</button>
                            </div>
                            <div class="my-2 d-flex justify-content-between align-items-center">
                                <div class="form-check">
                                    <label class="form-check-label text-muted">
                                        <input type="checkbox" class="form-check-input">
                                        Keep me signed in
                                    </label>
                                </div>
                                <a href="#" class="auth-link text-black">Forgot password?</a>
                            </div>
                            <div class="mb-2">
                                <button type="button" class="btn btn-block btn-facebook auth-form-btn">
                                    <i class="ti-facebook mr-2"></i>Connect using facebook
                                </button>
                            </div>
                            <div class="text-center mt-4 font-weight-light">
                                Don't have an account? <a href="{{ route('signup') }}"
                                    class="text-primary link">Create</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
