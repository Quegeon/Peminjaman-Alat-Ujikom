<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>
    @yield('title')
  </title>
  
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('/assets/img/apple-icon.png') }}">
  
  <link rel="icon" type="image/png" href="{{ asset('/assets/img/favicon.ico') }}">
  
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  
  <!-- Nucleo Icons -->
  <link href="{{ asset('/assets/css/nucleo-icons.css') }}" rel="stylesheet" />
  <link href="{{ asset('/assets/css/nucleo-svg.css') }}" rel="stylesheet" />
  
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

  <!-- CSS Files -->
  <link id="pagestyle" href="{{ asset('/assets/css/soft-ui-dashboard.css?v=1.0.7') }}" rel="stylesheet" />

  <!-- Datatable -->
  <link rel="stylesheet" href="{{ asset('/assets/datatable/dataTables.bootstrap4.min.css') }}">
</head>

<body class="g-sidenav-show  bg-gray-100">
  @include('sweetalert::alert')
  
  <!-- Sidebar  -->
  @include('layout.sidebar')

  <!-- Content -->
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    @yield('content')
  </main>

  <footer class="footer pt-3  ">
    <div class="container-fluid">
      <div class="row align-items-center justify-content-lg-between">
        <div class="col-lg-6 mb-lg-0 mb-4">
          <div class="copyright text-center text-sm text-muted text-lg-start">
            <!-- Copyright Stuff  -->
          </div>
        </div>
        <div class="col-lg-6">
          <ul class="nav nav-footer justify-content-center justify-content-lg-end">
            <!-- List of Contacts -->
          </ul>
        </div>
      </div>
    </div>
  </footer>


  <!--   Core JS Files   -->
  <script src="{{ asset('/assets/js/core/popper.min.js') }}"></script>
  <script src="{{ asset('/assets/js/core/bootstrap.min.js') }}"></script>
  <script  src="{{ asset('/assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
  <script src="{{ asset('/assets/js/plugins/smooth-scrollbar.min.js') }}"></script>

  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>

  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>

  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('/assets/js/soft-ui-dashboard.min.js?v=1.0.7') }}"></script>

  <!-- Ion Icon -->
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

  <!-- Datatable -->
  <script src="{{ asset('/assets/datatable/datatables.min.js') }}"></script>
  <script>
    $(document).ready(function () {$('#example').DataTable()})
  </script>

</body>

</html>