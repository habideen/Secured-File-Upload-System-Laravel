@include('user.inc.nav')

    <!-- partial -->
      <div class="main-panel">        
        <div class="content-wrapper">

          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/user/index">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Users</li>
            </ol>
          </nav>

          <div class="row">
            <div class="col-12">
              <div class="card">
              <div class="card-body">
                <h4 class="card-title">Store List</h4>
                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                      <thead>
                        <tr>
                            <th>Email</th>
                            <th>Name</th>
                            <th>Reg. Date</th>
                            <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                            <td>bravy@gmail.com</td>
                            <td>William Fred</td>
                            <td>20 Feb, 2022</td>
                            <td>
                              <button class="btn btn-outline-danger p-2" data-bs-toggle="modal" data-bs-target="#exampleModal-4" data-id="23" data-name="Whogohost" data-image="img-bravy"><i class="mdi mdi-settings"></i></button>
                              <a href="user_coupon.php" class="btn btn-outline-primary p-2"  data-id="23">Coupon</a>
                            </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
              </div>
            </div>
          </div>


          <!-- Modal -->
          <div class="modal fade" id="exampleModal-4" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel">Edit status</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form>
                  <input type="hidden" class="form-control" id="edit_id" name="edit_id">
                  <div class="form-group">
                    <label for="edit_name" class="form-label">Name:</label>
                    <input type="text" class="form-control" id="edit_name" readonly>
                  </div>
                  <div class="form-group">
                    <label for="edit_email" class="form-label">Email:</label>
                    <input type="text" class="form-control" id="edit_email" readonly>
                  </div>
                  </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-danger">Disable</button>
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
  modal.find('.modal-title').text('Edit store (' + button.data('id') + ')')
  modal.find('.modal-body #edit_store_id').val( button.data('id') )
  modal.find('.modal-body #edit_store_name').val( button.data('name') )
})
</script>
