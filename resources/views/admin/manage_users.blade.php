@include('admin.inc.nav')

    <!-- partial -->
      <div class="main-panel">        
        <div class="content-wrapper">

          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/admin/index">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Users</li>
            </ol>
          </nav>

          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Add System User</h4>

                  @if(Session::has('success'))
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                  @endif
                  @if(Session::has('fail'))
                    <div class="alert alert-danger">{{Session::get('fail')}}</div>
                  @endif

                  <form action="{{ route('manage_users') }}" method="post" class="forms-sample">
                    @csrf
                    <div class="form-group">
                      <label for="first_name">First name</label>
                      <input type="text" class="form-control" id="first_name" name="first_name" value="{{old('first_name')}}" required="true" placeholder="Enter first name">
                      @error('first_name')
                      <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="last_name">Last name</label>
                      <input type="text" class="form-control" id="last_name" name="last_name" value="{{old('last_name')}}" required="true" placeholder="Enter last name">
                      @error('last_name')
                      <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="account_type">User type</label>
                      <select class="form-control" id="account_type" name="account_type" value="{{old('account_type')}}" required="true">
                        <option value="">Select user type</option>
                        <option value="Admin">Admin</option>
                        <option value="User">User</option>
                      </select>
                      @error('account_type')
                      <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="text" class="form-control" id="email" name="email" value="{{old('email')}}" required="true" placeholder="E.g. abc@xyz.com">
                      @if (empty(old('edit_last_name')))
                        @error('email')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                      @endif
                    </div>
                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                    <button class="btn btn-light" type="reset">Cancel</button>
                  </form>
                </div>
              </div>
            </div><!--End of add store form-->



            <div class="col-12 mt-4">
              <div class="card">
              <div class="card-body">
                <h4 class="card-title">Store List</h4>
                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                      <thead>
                        <tr>
                            <th>Email</th>
                            <th>Name</th>
                            <th>Account</th>
                            <th>Reg. Date</th>
                            <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($users as $user)
                        <tr>
                          <td>{{ $user->email }}</td>
                          <td>{{ $user->last_name . ' ' . $user->first_name }}</td>
                          <td>{{ $user->account_type }}</td>
                          <td>{{ date('d-M-Y g:ia', strtotime($user->created_at)) }}</td>
                          <td>
                            <button class="btn p-2 {{ ($user->status)? 'btn-outline-success' : 'btn-outline-danger' }}" data-id="{{ $user->email }}" 
                              onclick="update_user_status(this)"
                              data-email="{{ $user->email }}" data-status="{{$user->status}}">
                              {{ ($user->status)? 'Disable' : 'Enable' }}</button>
                            <button class="btn btn-outline-danger p-2" data-bs-toggle="modal" data-bs-target="#edit_user_model" 
                              data-email="{{ $user->email }}" data-first_name="{{ $user->first_name }}" data-last_name="{{ $user->last_name }}"
                              data-account_type="{{ $user->account_type }}"><i class="mdi mdi-settings"></i></button>
                          </td>
                      </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
              </div>
            </div>
          </div>


          <!-- Modal -->
          <div class="modal fade" id="edit_user_model" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel">Edit User Account</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="{{ route('update_system_user') }}" method="post" class="forms-sample">
                  @csrf
                  <div class="form-group">
                    <label for="edit_first_name">First name</label>
                    <input type="text" class="form-control" id="edit_first_name" name="edit_first_name" value="{{old('edit_first_name')}}"
                    pattern="^[a-zA-Z\- ]+$" required="true" placeholder="Enter first name">
                    @error('edit_first_name')
                    <span class="text-danger error-msg">{{$message}}</span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="edit_last_name">Last name</label>
                    <input type="text" class="form-control" id="edit_last_name" name="edit_last_name" value="{{old('edit_last_name')}}"
                    pattern="^[a-zA-Z\- ]+$" required="true" placeholder="Enter last name">
                    @error('edit_last_name')
                    <span class="text-danger error-msg">{{$message}}</span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="edit_account_type">User type</label>
                    <select class="form-control" id="edit_account_type" name="edit_account_type" value="{{old('edit_account_type')}}" required="true">
                      <option value="">Select user type</option>
                      <option value="Admin">Admin</option>
                      <option value="User">User</option>
                    </select>
                    @error('edit_account_type')
                    <span class="text-danger error-msg">{{$message}}</span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" readonly="true" class="form-control" id="edit_email" name="email" value="{{old('email')}}" required="true" placeholder="E.g. abc@xyz.com">
                    @error('email')
                    <span class="text-danger error-msg">{{$message}}</span>
                    @enderror
                  </div>
                  <button type="submit" class="btn btn-primary me-2">Update record</button>
                </form>
              </div>
            </div><!--end of modal-->



          </div>
        </div>
        <!-- content-wrapper ends -->

@include('admin.inc.footer')

<script>



@if (!empty(old('edit_first_name')))
$(window).on('load', function (){
  $('#edit_user_model').modal('show');
  $('#edit_account_type').val( '{{ old('edit_account_type') }}' )
})
@endif


$('#edit_user_model').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal

  //prevent show error dialog from blanking out the input fields
  if (button.data('first_name') == null || button.data('first_name') == "")
    return;

  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-body #edit_first_name').val( button.data('first_name') )
  modal.find('.modal-body #edit_last_name').val( button.data('last_name') )
  modal.find('.modal-body #edit_email').val( button.data('email') )
  modal.find('.modal-body #edit_account_type').val( button.data('account_type') )

  modal.find('.modal-body .error-msg').html('');
})



function update_user_status(btn)
{ //alert('this 1')
  $.get(`{{ route('update_user_status') }}?user_email=${btn.dataset.email}&current_status=${btn.dataset.status}`, function(data, status){

    if (data==1)
    {
      if (btn.dataset.status==1)
      {
        btn.classList.remove('btn-outline-success')
        btn.classList.add('btn-outline-danger')
        btn.innerHTML = "Enable"
        btn.dataset.status = 0
      }
      else
      {
        btn.classList.remove('btn-outline-danger')
        btn.classList.add('btn-outline-success')
        btn.innerHTML = "Disable"
        btn.dataset.status = 1
      }
    }
  });
}


//jQuery.noConflict();
//$('#edit_user_model').modal('show');


  



</script>
