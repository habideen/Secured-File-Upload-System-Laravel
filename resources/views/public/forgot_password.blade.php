@include('inc.auth-nav')

  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
        <div class="row flex-grow">
          <div class="col-lg-6 d-flex align-items-center justify-content-center">
            <div class="auth-form-transparent text-left p-3">
              <div class="brand-logo">
                <a href="/"><img src="/images/favicon.png?h=20220310" alt="logo"></a>
              </div>
              <h4>Oops! We are sorry to hear that.</h4>
              <h6 class="fw-light">Please enter your email for reset password link.</h6>
              <form action="{{ route('login') }}" method="POST" class="pt-3 mt-5 mb-5">
                
                @if(Session::has('success'))
                    <div class="alert alert-success mt-3 mb-3">{{Session::get('success')}}</div>
                @endif
                @if(Session::has('fail'))
                    <div class="alert alert-danger mt-3 mb-3">{{Session::get('fail')}}</div>
                @endif

                @csrf
                <div class="form-group">
                  <label for="email">Email</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="ti-user text-primary"></i>
                      </span>
                    </div>
                    <input type="text" class="form-control form-control-lg border-left-0" id="email" name="email" placeholder="E.g. abc@xyz.com">
                  </div>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <a href="/login" class="auth-link text-black">I remember my password. Login.</a>
                </div>
                <div class="my-3 mt-5">
                  <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">Send link</button>
                </div>
              </form>
            </div>
          </div>
          <div class="col-lg-6 login-half-bg d-flex flex-row">
            <p class="text-white font-weight-medium text-center flex-grow align-self-end">Copyright &copy; 2021  All rights reserved.</p>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->

@include('inc.auth-footer')

</body>

</html>
