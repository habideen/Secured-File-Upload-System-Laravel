@include('user.inc.nav')

<!-- partial -->
  <div class="main-panel">        
    <div class="content-wrapper">

      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/admin/index">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Update profile</li>
        </ol>
      </nav>

      <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">

              @if(Session::has('success'))
                <div class="alert alert-success">{{Session::get('success')}}</div>
              @endif
              @if(Session::has('fail'))
                <div class="alert alert-danger">{{Session::get('fail')}}</div>
              @endif

              <div class="row justify-content-between">
                  <form action="{{ route('update_profile_passport') }}" method="post" enctype="multipart/form-data" class="col-md-4 col-sm-5 forms-sample text-center">
                    @csrf
                    <div class="form-group">
                      <img src="{{ $profile_image }}" class="rounded-circle img-fluid" style="max-width: 120px;">
                    </div>
                    <div class="form-group">
                      <label class="text-black-50" for="old_password">{{$profile->email}}</label>
                    </div>
                    <div class="form-group">
                      <input type="file" id="profile_image" name="profile_image" class="file-upload-default"
                      required="true" accept=".png,.jpeg,.jpg,.gif">
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary btn-sm rounded-0" type="button">Upload</button>
                        </span>
                      </div>
                      @error('profile_image')
                      <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                    <button type="submit" class="btn btn-primary me-2 pb-4 form-control">Update</button>
                  </form>


                  <form action="{{ route('update_profile') }}" method="post" class="col-md-6 col-sm-6 forms-sample">
                    @csrf
                    <div class="form-group row">
                      <div class="div col-12 col-sm-12 form-group">
                        <label for="Name">First Name</label>
                        <input type="text" class="form-control" 
                        value={{ !empty(old('first_name')) ? old('first_name'): $profile->first_name }} 
                        id="first_name" name="first_name" placeholder="Enter first name">
                      </div>
                      <div class="div col-12 col-sm-12 form-group">
                        <label for="Name">Last Name</label>
                        <input type="text" class="form-control" 
                        value={{ !empty(old('last_name')) ? old('last_name'): $profile->last_name }} 
                        id="last_name" name="last_name" placeholder="Enter last name">
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary me-2">Update</button>
                    <button class="btn btn-light" type="reset">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div><!--col-md-6-->
      </div><!--row-->
    <!-- content-wrapper ends -->

@include('user.inc.footer')
