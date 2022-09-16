@include('user.inc.nav')

    <!-- partial -->
      <div class="main-panel">        
        <div class="content-wrapper">

          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/user/index">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">My coupon</li>
            </ol>
          </nav>

          <div class="row">
            
            <div class="col-12">
              <div class="card">
              <div class="card-body">                
                <div class="mb-5 p-3 bg-light">
                  <h5 class=""><u>Fund (&#8358;)</u></h5>
                  <h6>Pending:&nbsp;&nbsp;&nbsp;300</h6>
                  <h6>Accepted:&nbsp;&nbsp;&nbsp;230</h6>
                  <h6>Rejected:&nbsp;&nbsp;&nbsp;43</h6>
                </div>
                
                <a href="#pending" id="btn-pending" data-value="dark" class="btn btn-outline-dark btn-sm change-view">Pending</a>
                <a href="#accepted" id="btn-accepted" data-value="success" class="btn btn-outline-success btn-sm change-view">Accepted</a>
                <a href="#rejected" id="btn-rejected" data-value="danger" class="btn btn-outline-danger btn-sm change-view">Rejected</a>

                
                <div class="table-responsive mt-5 d-none" id="pending">
                  <table id="table1" class="table">
                    <thead>
                      <tr>
                          <th>SN</th>
                          <th>Store</th>
                          <th>Coupon</th>
                          <th>Price (&#8358;)</th>
                          <th>Submitted Date</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                          <td>1</td>
                          <td>Whogohost</td>
                          <td>
                            <div class="input-group input-group-sm custom-input-group">
                              <input type="text" class="form-control" readonly="true" value="WHO202202">
                              <div class="input-group-append">
                                  <button type="button" class="btn btn-primary rounded-0" onclick="getText(this);"><i class="mdi mdi-content-copy"></i></button>
                                </div>
                            </div>
                          </td>
                          <td>15</td>
                          <td>5 Jan, 2022</td>
                      </tr>
                      <tr>
                          <td>1</td>
                          <td>Whogohost</td>
                          <td>
                            <div class="input-group input-group-sm custom-input-group">
                              <input type="text" class="form-control" readonly="true" value="WHO202202">
                              <div class="input-group-append">
                                  <button type="button" class="btn btn-primary rounded-0" onclick="getText(this);"><i class="mdi mdi-content-copy"></i></button>
                                </div>
                            </div>
                          </td>
                          <td>15</td>
                          <td>5 Jan, 2022</td>
                      </tr>
                      <tr>
                          <td>1</td>
                          <td>Whogohost</td>
                          <td>
                            <div class="input-group input-group-sm custom-input-group">
                              <input type="text" class="form-control" readonly="true" value="WHO202202">
                              <div class="input-group-append">
                                  <button type="button" class="btn btn-primary rounded-0" onclick="getText(this);"><i class="mdi mdi-content-copy"></i></button>
                                </div>
                            </div>
                          </td>
                          <td>15</td>
                          <td>5 Jan, 2022</td>
                      </tr>
                    </tbody>
                  </table>
                </div><!--pending-->

                                
                <div class="table-responsive mt-5 d-none" id="accepted">
                <table id="table1" class="table">
                    <thead>
                      <tr>
                          <th>SN</th>
                          <th>Store</th>
                          <th>Coupon</th>                          
                          <th>Price (&#8358;)</th>
                          <th>Submitted Date</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                          <td>1</td>
                          <td>Whogohost</td>
                          <td>WHO202202</td>
                          <td>15</td>
                          <td>5 Jan, 2022</td>
                      </tr>
                    </tbody>
                  </table>
                </div><!--accepted-->

                                
                <div class="table-responsive mt-5 d-none" id="rejected">
                <table id="table1" class="table">
                    <thead>
                      <tr>
                          <th>SN</th>
                          <th>Store</th>
                          <th>Coupon</th>
                          <th>Price (&#8358;)</th>
                          <th>Submitted Date</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                          <td>1</td>
                          <td>Whogohost</td>
                          <td>WHO202202</td>
                          <td>15</td>
                          <td>5 Jan, 2022</td>
                      </tr>
                    </tbody>
                  </table>
                </div><!--rejected-->


              </div>
            </div>
          </div>


          <!-- Modal -->
          <div class="modal fade" id="exampleModal-4" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel">Edit Coupon</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form>
                  <input type="hidden" class="form-control" id="edit_coupon_id" name="edit_coupon_id">
                  <div class="form-group">
                    <label for="edit_store" class="form-label">Store:</label>
                    <select class="form-control" id="store" name="edit_store">
                      <option value="">Select store</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="edit_coupon" class="form-label">Coupon:</label>
                    <input type="text" class="form-control" id="edit_coupon" name="edit_coupon">
                  </div>
                
                  </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-success">Update</button>
                      <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    </div>
                  </div>
                </form>
              </div>
            </div><!--end of modal-->



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


var previous_view = $.urlParam('view');
if ( previous_view == null || previous_view == 'pending' || previous_view == 'accepted' || previous_view == 'rejected' )
  previous_view = 'pending';

$('#' + previous_view).fadeIn(300)
$('#' + previous_view).removeClass('d-none')
$('#btn-' + previous_view).removeClass('btn-outline-dark')
$('#btn-' + previous_view).addClass('btn-dark')


jQuery("a.change-view").click(function(){
  let new_view = $(this).prop('href')
  new_view = new_view.substring(new_view.lastIndexOf('#') + 1)
  
  if (new_view == previous_view) return

  let previous_btn_colour = $('#btn-'+previous_view).data('value')
  let new_btn_colour = $(this).data('value')
  //alert(previous_btn_colour + "  --  " + new_btn_colour)

  $('#' + previous_view).addClass('d-none')
  $("#" + previous_view).hide()
  $('#btn-' + previous_view).removeClass('btn-' + previous_btn_colour)
  $('#btn-' + previous_view).addClass('btn-outline-' + previous_btn_colour)  
  
  $("#" + new_view).fadeIn(300);
  $('#' + new_view).removeClass('d-none')
  $('#btn-' + new_view).addClass('btn-' + new_btn_colour)
  $('#btn-' + new_view).removeClass('btn-outline-' + new_btn_colour) 

  previous_view = new_view
});


jQuery('button.process-submission').click(function(){
  alert($(this).data('type') + ' --  ' + $(this).data('id'))
});

</script>