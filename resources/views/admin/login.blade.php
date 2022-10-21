@include('admin.layout.head')

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/logo.png" alt="">
                  <span class="d-none d-lg-block">BL-Admin</span>
                </a>

               
              </div><!-- End Logo -->
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
              <div class="card mb-3">

                <div class="card-body">
                  <h4 class="text-center text-primary mt-3">Login</h4>
                  <div class="pt-4 pb-2">
                    <p class="alert alert-danger text-center">If you are a user and you are seeing this page please ignore</p>
                    <p class="text-center small">Enter your username & password to login</p>
                  </div>

                  <form  action="{{ route('bl-admin_check') }}" method="POST" class="row g-3 needs-validation" novalidate>
                    @csrf
                    @method('post')
                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Username</label>
                      <div class="input-group has-validation">
                        <input type="text" name="username" class="form-control" id="yourUsername" required>
                        <div class="invalid-feedback">Please enter your username.</div>
                      </div>
                    </div>
                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="yourPassword" required>
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>

                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Remember me</label>
                      </div>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Login</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Don't have account? <a href="pages-register.html">Create an account</a></p>
                    </div>
                  </form>

                </div>
              </div>
          </div>
        </div>

      </section>

    </div>
  </main>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
</body>
</html>