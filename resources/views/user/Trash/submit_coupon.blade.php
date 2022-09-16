@include('user.inc.nav')

    <!-- partial -->
      <div class="main-panel">        
        <div class="content-wrapper">

          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/user/index">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Submit coupon</li>
            </ol>
          </nav>

          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Submit Coupon</h4>
                  <p class="card-description">Make sure that the coupon was used before sumitting it.</p>

                  @if(Session::has('success'))
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                  @endif
                  @if(Session::has('fail'))
                    <div class="alert alert-danger">{{Session::get('fail')}}</div>
                  @endif

                  <form action="{{ route('user.submit_coupon') }}" method="post" class="forms-sample">
                    @csrf
                    <div class="form-group">
                      <label for="store_name">Store name</label>
                      <select class="form-control" id="store_id" name="store_id">
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
                      <input type="text" class="form-control" id="coupon_code" name="coupon_code" placeholder="Enter coupon code">
                      @error('coupon_code')
                      <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                    <button class="btn btn-light" type="reset">Cancel</button>
                  </form>
                </div>
              </div>
            </div><!--End of add store form-->



          </div>
        </div>
        <!-- content-wrapper ends -->

@include('user.inc.footer')

<script>
$('#exampleModal-4').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('Edit coupon (' + button.data('id') + ')')
  modal.find('.modal-body #edit_coupon_id').val( button.data('id') )
  modal.find('.modal-body #edit_store').val( button.data('store') )
  modal.find('.modal-body #edit_coupon').val( button.data('coupon') )
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

//restore old submission if any
if ('{{ old('store_id') }}' != '')
{
  $('#store_id').val('{{ old('store_id') }}')
  $('#coupon_code').val('{{ old('coupon_code') }}')
}
else
{
  $('#store_id').val('{{ $url_store_id }}')
  $('#coupon_code').val('{{ $url_coupon_code }}')
}
</script>