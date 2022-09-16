@include('user.inc.nav')

    <!-- partial -->
      <div class="main-panel">        
        <div class="content-wrapper">

          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/user/index">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Manage store</li>
            </ol>
          </nav>

          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Register Store</h4>
                  <p class="card-description">
                    Add individual store here
                  </p>
                  <form action="" method="post" class="forms-sample">
                    <div class="form-group">
                      <label for="store_name">Name</label>
                      <input type="text" class="form-control" id="store_name" name="store_name" placeholder="Username">
                    </div>
                    <div class="form-group">
                      <label>Image (option)</label>
                      <input type="file" name="store_images" class="file-upload-default">
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary btn-sm rounded-0" type="button">Upload</button>
                        </span>
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
                <h4 class="card-title">Store List</h4>
                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                      <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Date Registered</th>
                            <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                            <td>1</td>
                            <td>2012/08/03</td>
                            <td>Edinburgh</td>
                            <td>
                              <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal-4" data-id="23" data-name="Whogohost" data-image="img-bravy">Edit</button>
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
                <h5 class="modal-title" id="ModalLabel">Edit store name</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form>
                  <input type="hidden" class="form-control" id="edit_store_id" name="edit_store_id">
                  <div class="form-group">
                    <label for="edit_store_name" class="form-label">Name:</label>
                    <input type="text" class="form-control" id="edit_store_name" name="edit_store_name">
                  </div>
                  <div class="form-group">
                    <label for="edit_store_image" class="form-label">Image (option)</label>
                    <input type="file" name="store_images" class="file-upload-default">
                    <div class="input-group col-xs-12">
                      <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                      <span class="input-group-append">
                        <button class="file-upload-browse btn btn-primary btn-sm rounded-0" type="button">Upload</button>
                      </span>
                    </div>
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
  modal.find('.modal-title').text('Edit store (' + button.data('id') + ')')
  modal.find('.modal-body #edit_store_id').val( button.data('id') )
  modal.find('.modal-body #edit_store_name').val( button.data('name') )
})
</script>
