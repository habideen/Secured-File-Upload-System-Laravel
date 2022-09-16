@include('admin.inc.nav')

    <!-- partial -->
      <div class="main-panel">        
        <div class="content-wrapper">

          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/admin/index">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Add user</li>
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

                  <form action="{{ route('register_coupon') }}" method="post" class="forms-sample">
                    @csrf
                    <div class="form-group">
                      <label for="store_name">Store name</label>
                      <select class="form-control" id="store_id" name="store_id" value="{{old('store_id')}}" required="true">
                        <option value="">Select store</option>
                        @foreach ($stores as $store)
                        <option value="{{$store->id}}">{{$store->store_name}}</option>
                        @endforeach
                      </select>
                      @error('store_id')
                      <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="coupon_code">Coupon</label>
                      <input type="text" class="form-control" id="coupon_code" name="coupon_code" value="{{old('coupon_code')}}" required="true" placeholder="Enter coupon code">
                      @error('coupon_code')
                      <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="coupon_code">Price</label>
                      <input type="text" class="form-control" id="coupon_price" name="coupon_price" value="{{old('coupon_price')}}" required="true" pattern="^[1-9][0-9]*$" placeholder="Enter coupon price">
                      @error('coupon_price')
                      <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="coupon_code">Coupon URL</label>
                      <input type="text" class="form-control" id="coupon_url" name="coupon_url" value="{{old('coupon_url')}}" required="true" placeholder="Enter coupon price">
                      @error('coupon_url')
                      <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                    <div class="row">
                      <div class="col-12 col-md-6">
                        <div class="form-group">
                          <label for="store_name">Start</label>
                          <input type="date" class="form-control pt-2 pb-2" id="coupon_start" name="coupon_start" value="{{old('coupon_start')}}" required="true">
                          @error('coupon_start')
                          <span class="text-danger">{{$message}}</span>
                          @enderror
                        </div>
                      </div>
                      <div class="col-12 col-md-6">
                        <div class="form-group">
                          <label for="store_name">End</label>
                          <input type="date" class="form-control pt-2 pb-2" id="coupon_end" name="coupon_end" value="{{old('coupon_end')}}" required="true">
                          @error('coupon_end')
                          <span class="text-danger">{{$message}}</span>
                          @enderror
                        </div>
                      </div>
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
                <h4 class="card-title">Coupon List</h4>
                    <div class="table-responsive">
                      <table id="order-listing" class="table">
                        <thead>
                          <tr>
                              <th>ID</th>
                              <th>Store</th>
                              <th>Coupon</th>
                              <th>Price (&#8358;)</th>
                              <th>Start</th>
                              <th>End</th>
                              <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($coupons as $coupon)
                          <tr>
                            <td>{{ $coupon->id }}</td>
                            <td><a href="{{ $coupon->coupon_url }}" target="_blank">{{ $coupon->store_name }}</a></td>
                            <td>
                              <div class="input-group input-group-sm custom-input-group">
                                <input type="text" class="form-control" readonly="true" value="{{ $coupon->coupon_code }}">
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-primary rounded-0" 
                                      onclick="getText(this);"><i class="mdi mdi-content-copy"></i></button>
                                  </div>
                              </div>
                            </td>
                            <td>{{ $coupon->coupon_price }}</td>
                            <td>{{ date('d-M-Y', strtotime($coupon->coupon_start)) }}</td>
                            <td>{{ date('d-M-Y', strtotime($coupon->coupon_end)) }}</td>
                            <td>
                            <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#edit_coupon_modal" 
                              data-id="{{ $coupon->id }}" 
                              data-store="{{ $coupon->store_id }}"
                              data-coupon="{{ $coupon->coupon_code }}"
                              data-price="{{ $coupon->coupon_price }}"
                              data-url="{{ $coupon->coupon_url }}"
                              data-start="{{ $coupon->coupon_start }}"
                              data-end="{{ $coupon->coupon_end }}">Edit</button>
                            <button class="btn {{ ($coupon->status)? 'btn-outline-success' : 'btn-outline-danger' }}" data-id="{{ $coupon->id }}" 
                              onclick="update_coupon_status(this)"
                              data-id="{{ $coupon->id }}" data-status="{{$coupon->status}}">
                              {{ ($coupon->status)? 'Disable' : 'Enable' }}</button>
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
          <div class="modal fade" id="edit_coupon_modal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel">Edit Coupon</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="{{ route('update_coupon') }}" method="post" class="forms-sample">
                  @csrf
                  <input type="text" class="form-control" id="edit_coupon_id" name="edit_coupon_id" value="{{old('edit_coupon_id')}}">
                  <div class="form-group">
                    <label for="edit_store_id">Store name</label>
                    <select class="form-control" id="edit_store_id" name="edit_store_id" value="{{old('edit_store_id')}}" required="true">
                      <option value="">Select store</option>
                      @foreach ($stores as $store)
                      <option value="{{$store->id}}">{{$store->store_name}}</option>
                      @endforeach
                    </select>
                    @error('edit_store_id')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="edit_coupon_code">Coupon</label>
                    <input type="text" class="form-control" id="edit_coupon_code" name="edit_coupon_code" value="{{old('edit_coupon_code')}}" required="true" placeholder="Enter coupon code">
                    @error('edit_coupon_code')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="edit_coupon_price">Price</label>
                    <input type="text" class="form-control" id="edit_coupon_price" name="edit_coupon_price" value="{{old('edit_coupon_price')}}" required="true" pattern="^[1-9][0-9]*$" placeholder="Enter coupon price">
                    @error('edit_coupon_price')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="edit_coupon_url">Coupon URL</label>
                    <input type="text" class="form-control" id="edit_coupon_url" name="edit_coupon_url" value="{{old('edit_coupon_url')}}" required="true" placeholder="Enter coupon price">
                    @error('edit_coupon_url')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
                  <div class="row">
                    <div class="col-12 col-md-6">
                      <div class="form-group">
                        <label for="edit_coupon_start">Start</label>
                        <input type="date" class="form-control pt-2 pb-2" id="edit_coupon_start" name="edit_coupon_start" value="{{old('edit_coupon_start')}}" required="true">
                        @error('edit_coupon_start')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-12 col-md-6">
                      <div class="form-group">
                        <label for="edit_coupon_end">End</label>
                        <input type="date" class="form-control pt-2 pb-2" id="edit_coupon_end" name="edit_coupon_end" value="{{old('edit_coupon_end')}}" required="true">
                        @error('edit_coupon_end')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                      </div>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary me-2">Submit</button>
                  <button class="btn btn-light" type="reset">Cancel</button>
                </form>
              </div>
            </div><!--end of modal-->



          </div>
        </div>
        <!-- content-wrapper ends -->

@include('admin.inc.footer')

<script>
$('#edit_coupon_modal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('Edit coupon (' + button.data('id') + ')')
  modal.find('.modal-body #edit_coupon_id').val( button.data('id') )
  modal.find('.modal-body #edit_store_id').val( button.data('store') )
  modal.find('.modal-body #edit_coupon_code').val( button.data('coupon') )
  modal.find('.modal-body #edit_coupon_price').val( button.data('price') )
  modal.find('.modal-body #edit_coupon_url').val( button.data('url') )
  modal.find('.modal-body #edit_coupon_start').val( button.data('start') )
  modal.find('.modal-body #edit_coupon_end').val( button.data('end') )
})


function successPopup(title, msg)
{
    const myNotification = window.createNotification({
        // options here
    });

    myNotification({ 
        title: title,
        message: msg 
    });

    myNotification({ 
        // close on click
        closeOnClick: true,
        // displays close button
        displayCloseButton: false,
        // nfc-top-left
        // nfc-bottom-right
        // nfc-bottom-left
        positionClass: 'nfc-top-right',
        // callback
        onclick: false,
        // timeout in milliseconds
        showDuration: 3500,
        // success, info, warning, error, and none
        theme: 'success'    
    });    
}


function getText(el)
{
    var elem = $(el).parent().prev();
    elem.select();
    document.execCommand('copy');

    successPopup('Copy', 'Coupon was copied successfully.') 
}

@if (!empty(old('edit_coupon_id')))
$('#edit_coupon_modal').modal()
@endif


function update_coupon_status(btn)
{
  $.get(`{{ route('update_coupon_status') }}?coupon_id=${btn.dataset.id}&current_status=${btn.dataset.status}`, function(data, status){

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

  
</script>