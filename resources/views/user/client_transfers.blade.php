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
              <li class="breadcrumb-item active" aria-current="page">File Transfers</li>
            </ol>
          </nav>

          <div class="row">
            <div class="col-12 mt-4">
              <div class="card">
              <div class="card-body">
                <h4 class="card-title">File Transfers</h4>
                  <div class="row mb-5">
                    <div class="col-sm-6 mb-4">
                      <p>Email address: {{ $client_profile->email }}</p>
                      <p>Full name: {{ $client_profile->first_name . ' ' . $client_profile->last_name }}</p>
                      <p class="text-info h5">Upload link is sent to the client's email</p>
                    </div>
                    <div class="col-sm-6">
                      @if (Session::get('account_type') == 'User')
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit_transfer_model">Generate and Send New Link</button>
                      @endif
                      
                    </div>
                  </div>
                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                      <thead>
                        <tr>
                            <th>ID</th>
                            <th>Created By</th>
                            <th>Due time</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($transfer_links as $transfer_link)
                        <tr>
                          <td>{{ $transfer_link->id }}</td>
                          <td>{{ ($transfer_link->created_by == Session::get('loginID')) ? 'Me' : 'Other'  }}</td>
                          <td>{{ date('Y-m-d g:ia', strtotime($transfer_link->updated_at . " + {$link_expiration} days")) }}</td>
                          <td>{!! ($transfer_link->status) ? '<i class="text-success">Received</i>' : '<i class="text-danger">Waiting</i>'  !!}</td>
                          <td>
                            @if (($transfer_link->status))
                            <a href="{{ url('upload/download/' . $transfer_link->id) }}" class="btn btn-outline-success pl-3 pr-2 pt-2 pb-2"><i class="mdi mdi-download"></i></a>
                            @endif
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
          <div class="modal fade" id="edit_transfer_model" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel">Generate new upload link</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="{{ route('client_file_transfer') }}" method="post" class="forms-sample">
                  @csrf
                  <input type="hidden" name="email" value="{{ $client_profile->email }}" class="form-control">
                  <p>
                    Download link is generated automatically and sent to client's email address. 
                    A token is sent along with the email which is needed to be entered in order to upload their files.
                  </p>
                  <button type="submit" class="btn btn-primary mt-4">Send Upload Link</button>
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
  $('#edit_transfer_model').modal('show');
})
@endif


$('#edit_transfer_model').on('show.bs.modal', function (event) {
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
