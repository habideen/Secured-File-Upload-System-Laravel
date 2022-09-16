@php
  $user_path = (Session::get('account_type') == 'Admin')? 'admin':'user';
@endphp
@include($user_path . '.inc.nav')

    <!-- partial -->
      <div class="main-panel">        
        <div class="content-wrapper">

          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/admin/index">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Update password</li>
            </ol>
          </nav>

          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Change Password</h4>

                  @if(Session::has('success'))
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                  @endif
                  @if(Session::has('fail'))
                    <div class="alert alert-danger">{{Session::get('fail')}}</div>
                  @endif

                  <form action="{{ route('password') }}" method="post" class="forms-sample">
                    @csrf
                    <div class="form-group">
                      <label for="old_password">Old password</label>
                      <input type="password" class="form-control" id="old_password" name="old_password" placeholder="Username">
                      @error('old_password')
                      <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                    <div class="form-group mt-5">
                      <label for="new_password">New password</label>
                      <input type="password" class="form-control" id="new_password" name="new_password" placeholder="Username">
                      @error('new_password')
                      <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="confirm_password">Confirm password</label>
                      <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Username">
                      @error('confirm_password')
                      <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                    <button type="submit" class="btn btn-primary me-2">Update</button>
                    <button class="btn btn-light" type="reset">Cancel</button>
                  </form>
                </div>
              </div>
            </div><!--End of add store form-->

          </div>
        </div>
        <!-- content-wrapper ends -->

@include($user_path . '.inc.footer')
