<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Coupon Admin </title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="/vendors/feather/feather.css">
  <link rel="stylesheet" href="/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="/vendors/typicons/typicons.css">
  <link rel="stylesheet" href="/vendors/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="/vendors/datatable/dataTables.bootstrap4.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="/js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="/css/vertical-layout-light/style.css">
  <link rel="stylesheet" href="/css/custom.css">
  <link rel="stylesheet" href="/assets/css/notifications.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="/images/favicon.png" />
  <style>
      body{background-color: #F4F5F7}
  </style>
</head>
<body>
    <div class="container-scroller">

        <div class="row justify-content-center pt-5 pb-5">
            <div class="col-lg-4 col-md-5 col-sm-5 mt-5">
                <div class="card-body bg-white shadow-lg p-5">
                    <div class="text-center mb-5">
                        <div class="mb-4 pb-3"><img src="/images/favicon.png" alt="logo"/></div>
                        <h4 class="card-title">File Upload Access</h4>
                        <p class="card-description">Please enter the data sent to your mail.</p>
                    </div>

                    @if(Session::has('success'))
                        <div class="alert alert-success mt-3 mb-3">{{Session::get('success')}}</div>
                    @endif
                    @if(Session::has('fail'))
                        <div class="alert alert-danger mt-3 mb-3">{{Session::get('fail')}}</div>
                    @endif
                    
                    <form action="{{ route('upload.login', $url_code) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type='email' id="email" name="email" required="true" class="form-control" placeholder="E.g. abc@xyz.com" />
                        </div>
                        <div class="form-group">
                            <label for="token">Code</label>
                            <input type='text' id="token" name="token" required="true" class="form-control" placeholder="Please enter your code" />
                        </div>
                        <div class="form-group">
                            <button type="submit" class="form-control btn-primary pb-4">Continue</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <!-- container-scroller -->

    <!-- plugins:js -->
    <script src="/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="/vendors/chart.js/Chart.min.js"></script>
    <script src="/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="/vendors/datatable/jquery.dataTables.js"></script>
    <script src="/vendors/datatable/dataTables.bootstrap4.js"></script>
    <script src="/vendors/datatable/js_data-table.js"></script>

    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="/js/off-canvas.js"></script>
    <script src="/js/hoverable-collapse.js"></script>
    <script src="/js/template.js"></script>
    <script src="/js/settings.js"></script>
    <script src="/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="/js/jquery.cookie.js" type="text/javascript"></script>
    <script src="/js/dashboard.js"></script>
    <script src="/js/Chart.roundedBarCharts.js"></script>
    <script src="/js/file-upload.js"></script>
    <script src="/js/custom-functions.js"></script>
    <script src="/assets/js/custom/notifications.js"></script>
    <!-- End custom js for this page-->
</body>
</html>