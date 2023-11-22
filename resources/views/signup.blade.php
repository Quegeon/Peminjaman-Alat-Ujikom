<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('/assets/img/apple-icon.png') }}">
  <link rel="icon" type="image/png" href="{{ asset('/assets/img/favicon.ico') }}">
  <title>
    Halaman Sign Up
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css?v=1.0.7" rel="stylesheet" />
  <!-- Nepcha Analytics (nepcha.com) -->
  <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
  <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
</head>

<body class="">
    @include('sweetalert::alert')
  <main class="main-content  mt-0">
    <section class="min-vh-100 mb-8">
      <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg" style="background-image: url('../assets/img/bgsignup.jpg');">
        <span class="mask bg-gradient-dark opacity-6"></span>
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-5 text-center mx-auto">
              <h1 class="text-white mb-2 mt-5">Sign Up</h1>
              <p class="text-lead text-white">Masukkan Data Diri Untuk Membuat Akun Baru</p>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row mt-lg-n10 mt-md-n11 mt-n10">
          <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
            <div class="card z-index-0">
              <div class="card-header text-center pt-4">
                <h4>Form Register Akun</h4>
              </div>
              <div class="card-body">
                <form action="/postsignup" method="post" role="form text-left">
                    @csrf
                  <div class="mb-3">
                    <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama">
                    @if ($errors->first('nama'))
                        <p class="text-danger">* {{$errors->first('nama')}}</p>
                    @endif
                  </div>
                  <div class="mb-3">
                    <input type="text" class="form-control" name="username" placeholder="Masukkan Username">
                    @if ($errors->first('username'))
                        <p class="text-danger">* {{$errors->first('username')}}</p>
                    @endif
                  </div>
                  <div class="mb-3">
                    <input type="password" class="form-control" name="password" placeholder="Masukkan Password">
                    @if ($errors->first('password'))
                        <p class="text-danger">* {{$errors->first('password')}}</p>
                    @endif
                  </div>
                  <div class="mb-3">
                    <input type="text" class="form-control" name="no_telp" placeholder="Masukkan No Telp">
                    @if ($errors->first('no_telp'))
                        <p class="text-danger">* {{$errors->first('no_telp')}}</p>
                    @endif
                  </div>
                  <div class="mb-3">
                    <input type="text" class="form-control" name="email" placeholder="Masukkan Email">
                    @if ($errors->first('email'))
                        <p class="text-danger">* {{$errors->first('email')}}</p>
                    @endif
                  </div>
                  <div class="mb-3">
                    <input type="text" class="form-control" name="alamat" placeholder="Masukkan Alamat (Opsional)">
                    @if ($errors->first('alamat'))
                        <p class="text-danger">* {{$errors->first('alamat')}}</p>
                    @endif
                  </div>
                  {{-- <div class="form-check form-check-info text-left">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                    <label class="form-check-label" for="flexCheckDefault">
                      I agree the <a href="javascript:;" class="text-dark font-weight-bolder">Terms and Conditions</a>
                    </label>
                  </div> --}}
                  <div class="text-center">
                    <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Sign up</button>
                  </div>
                  <p class="text-sm mt-3 mb-0">Sudah Memiliki Akun? <a href="/" class="text-dark font-weight-bolder">Login</a></p>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
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
  <script src="../assets/js/soft-ui-dashboard.min.js?v=1.0.7"></script>
</body>

</html>