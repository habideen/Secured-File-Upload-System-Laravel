@if (Session::get('account_type') == 'User')
  @include('user.inc.nav')
@else
  @include('admin.inc.nav')
@endif


    <!-- partial -->
      <div class="main-panel">        
        <div class="content-wrapper">

          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/admin/index">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">All Clients</li>
            </ol>
          </nav>

          <div class="row">
            <div class="col-12 mt-4">
              <div class="card">
              <div class="card-body">
                <h4 class="card-title">All CLients List</h4>
                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                      <thead>
                        <tr>
                            <th>Email</th>
                            <th>Name</th>
                            <th>Created By</th>
                            <th>Reg. Date</th>
                            <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($clients as $client)
                        <tr>
                          @if (Session::get('account_type') == 'User')
                            <td><a href="{{ route('client_file_transfer').'/'.$client->id }}">{{ $client->email }}</a></td>
                          @else
                            <td><a href="{{ '/admin/client_file_transfer'.'/'.$client->id }}">{{ $client->email }}</a></td>
                          @endif
                          
                          <td>{{ $client->last_name . ' ' . $client->first_name }}</td>
                          <td>{{ ($client->created_by == Session::get('loginID')) ? 'Me' : 'Other'  }}</td>
                          <td>{{ date('d-M-Y g:ia', strtotime($client->created_at)) }}</td>
                          <td>
                            <button class="btn btn-outline-danger p-2" data-bs-toggle="modal" data-bs-target="#edit_client_model" 
                              data-email="{{ $client->email }}" data-first_name="{{ $client->first_name }}" 
                              data-last_name="{{ $client->last_name }}"
                              ><i class="mdi mdi-settings"></i></button>
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
          <div class="modal fade" id="edit_client_model" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel">Edit User Account</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="{{ route('update_client') }}" method="post" class="forms-sample">
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

@if (Session::get('account_type') == 'User')
  @include('user.inc.footer')
@else
  @include('admin.inc.footer')
@endif

<script>



@if (!empty(old('edit_first_name')))
$(window).on('load', function (){
  $('#edit_client_model').modal('show');
})
@endif


$('#edit_client_model').on('show.bs.modal', function (event) {
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


  



</script>
