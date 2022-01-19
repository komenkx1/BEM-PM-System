<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Dashboard BEM PM Unud">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="RHH" content="Dashboard BEM PM UNUD">
  <title>{{$title.' - BEM PM Unud'}}</title>
  <!-- Favicon -->
  <link rel="icon" href="/assets/img/icon.png" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="/assets/admin/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="/assets/admin/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Page plugins -->
  <link href="/assets/admin/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.dataTables.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/select/1.3.1/css/select.dataTables.min.css" rel="stylesheet">
  <!-- fullcalendar -->
  <link rel="stylesheet" href="/assets/fullcalendar/dist/fullcalendar.min.css">
  <link rel="stylesheet" href="/assets/fullcalendar/dist/fullcalendar.print.min.css" media="print">
  <!-- Argon CSS -->
  <link rel="stylesheet" href="/assets/admin/css/argon.css?v=1.2.0" type="text/css">

  <!-- CKEditor (important)-->
  <script src="https://cdn.ckeditor.com/4.14.0/full-all/ckeditor.js"></script>

</head>

<body>

  <!-- Sidenav -->
  @include('admin/layouts/sidenav')
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    @include('admin/layouts/topnav')
    <!-- Header -->
    <!-- Header -->
    <!-- Page content -->
    @yield('content')
    <!-- Footer -->
    <footer class="container-fluid footer pt-0">
      <div class="row align-items-center justify-content-lg-between">
        <div class="col-lg-6">
          <div class="copyright text-center  text-lg-left  text-muted">
            &copy; 2121 Rhh-Kominfo</a>
          </div>
        </div>
   
      </div>
    </footer>
    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Alert!</h4>
            <hr>
          </div>
          <div class="modal-body">

            @if ($message = Session::get('denied'))
            <strong>{{ $message }}</strong>
            @endif
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>

      </div>
    </div>
  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="/assets/admin/vendor/jquery/dist/jquery.min.js"></script>
  <script src="/assets/admin/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="/assets/admin/vendor/js-cookie/js.cookie.js"></script>
  <script src="/assets/admin/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="/assets/admin/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Optional JS -->
  <script src="/assets/moment/moment.js"></script>
  <!-- Datatable -->
  <script src="/assets/admin/vendor/datatables/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
  <script src=" https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>
  <!-- Argon JS -->
  <script src="/assets/admin/js/argon.js?v=1.2.0"></script>
  <script>
 
    $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
 // Add active state to sidbar nav links
 var path = window.location.href; // because the 'href' property of the DOM element is the absolute path
        $(".navbar-nav .nav-item a.nav-link").each(function() {
            if (this.href === path) {
                $(this).addClass("active");
            }
        });

        @if ($message = Session::get('denied'))
        $('#myModal').modal("show");
@endif
  </script>
  @yield('footer')
</body>

</html>