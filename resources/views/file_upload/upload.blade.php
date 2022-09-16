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
  <link rel="stylesheet" href="/vendors/jquery-file-upload/uploadfile.css">
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
    body{
        background-color: #F4F5F7;
    }
        .ajax-upload-dragdrop{
        width: 100%!important;
        padding: 5rem;
        background-color: #f7f7f7;
    }
  </style>
</head>
<body>
    <div class="container">

        <div class="row justify-content-center pb-5">
            <div class="col-12 mt-5">
                <div class="card-body bg-white shadow-lg p-5 rounded">
                    <div class="text-center mb-5">
                        <div class="mb-4 pb-3"><img src="/images/favicon.png" alt="logo"/></div>
                        <h4 class="card-title">Upload Your File Here</h4>
                        <p class="card-description">Make sure to click done when your are through.</p>
                    </div>

                    @if(Session::has('success'))
                        <div class="alert alert-success mt-3 mb-3">{{Session::get('success')}}</div>
                    @endif
                    @if(Session::has('fail'))
                        <div class="alert alert-danger mt-3 mb-3">{{Session::get('fail')}}</div>
                    @endif

                    @php
                        $c = 1;
                        if (!empty($file_list))
                            echo '<h3 class="mb-4">Previous files</h3>';
                    @endphp
                    @foreach ($file_list as $file)
                        <div class="bg-light p-3 mb-3 border" id='delete_file_{{$c}}'>
                            {{ basename($file) }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <button class="btn btn-danger btn-sm" type="button" onclick="delete_file('{{ basename($file) }}', 'delete_file_{{$c++}}')">Delete</button>
                        </div> 
                    @endforeach
                    
                    <div class="file-upload-wrapper mt-5">
                        <div id="fileuploader">Upload</div>
                    </div>

                    <form method="post" action="{{ route('upload.submit') }}">
                        @csrf
                        <input type="hidden" name="upload_token" value="{{ $jwt }}">
                        <button type="submit" class="btn btn-success" onclick="confirm_submit()">Submit upload</button>
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
    <script src="/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="/vendors/jquery-file-upload/jquery.uploadfile.min.js"></script>

    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="/js/off-canvas.js"></script>
    <script src="/js/hoverable-collapse.js"></script>
    <script src="/js/template.js"></script>
    <script src="/js/settings.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="/js/jquery.cookie.js" type="text/javascript"></script>
    <script src="/js/dashboard.js"></script>
    <script src="/js/file-upload.js"></script>
    <script src="/js/custom-functions.js"></script>
    <!-- End custom js for this page-->

    <script>
    function confirm_submit()
    {
        if (!confirm('This action is not reversible. Submit now?'))
            event.preventDefault();
    }



    function delete_file(file_name, div_id)
    {
        $.post("{{ route('upload.delete') }}", 
        
        {op: "delete",name: file_name, "upload_token":"{{ $jwt }}", "_token":"{{ csrf_token() }}"},
        
        function (resp,textStatus, jqXHR) {
            //Show Message
            if (resp == 'Invalid data supplied.')
            {
                alert( resp );
                return;
            }
            else if ( resp == 'This page has expired. You will be redirected to login page.')
            {
                alert( resp );
                window.location.href = '{{ url('/upload/login/'.$url_code) }}';
            }
            else
            {
                $('#'+div_id).remove();
                //alert(resp);
            }
        });
    }




    $(document).ready(function()
    {

        $("#fileuploader").uploadFile({
        url:"{{ route('upload.push') }}",
        fileName:"myFile",
        sequential:true,
        sequentialCount:1,
        allowDuplicates:false,
        showStatusAfterSuccess: true,
        showDelete: true,
        showDownload:false,
        returnType:"json",
        formData: {"upload_token":"{{ $jwt }}", "_token":"{{ csrf_token() }}"},
        deleteCallback: function (data, pd) {            
            for (var i = 0; i < data.length; i++) {
                $.post("{{ route('upload.delete') }}", 
                {op: "delete",name: data[i], "upload_token":"{{ $jwt }}", "_token":"{{ csrf_token() }}"},
                function (resp,textStatus, jqXHR) {
                    //Show Message
                    if (resp == 'Invalid data supplied.')
                    {
                        alert( resp );
                        return;
                    }
                    else if ( resp == 'This page has expired. You will be redirected to login page.')
                    {
                        alert( resp );
                        window.location.href = '{{ url('/upload/login/'.$url_code) }}';
                    }
                    // else
                    //     alert(resp);
                });
            }
            pd.statusbar.hide(); //You choice.

        },
        onError: function(files,status,errMsg,pd)
        {
            if (errMsg == 'Unauthorized')
            {
                alert( 'This page has expired. You will be redirected to login page.' )
                window.location.href = '{{ url('/upload/login/'.$url_code) }}';
            }
            else
                alert( 'No file was uploaded. Please upload one.' )
        },
        afterUploadAll:function(obj)
        {
            alert("All files are uploaded");
        },
        });
    });
    </script>
</body>
</html>