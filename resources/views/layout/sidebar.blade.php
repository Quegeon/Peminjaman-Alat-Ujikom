@if (Auth::user()->level === 'Admin')
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0">
        <img src="{{ asset('/assets/img/Logo Peminjaman Alat Praktik - Aldy Aditia Hidayat.png') }}" class="navbar-brand-img h-100">
        <span class="ms-1 font-weight-bold">Peminjaman Alat</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" href="/dashboard">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <ion-icon name="home-outline"></ion-icon>
            </div>
            <span class="nav-link-text ms-1">Dashboard Admin</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/petugas">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <ion-icon name="caret-forward-outline"></ion-icon>
            </div>
            <span class="nav-link-text ms-1">Kelola Data Petugas</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/member">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <ion-icon name="caret-forward-outline"></ion-icon>
            </div>
            <span class="nav-link-text ms-1">Kelola Data Member</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/jenis">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <ion-icon name="caret-forward-outline"></ion-icon>
            </div>
            <span class="nav-link-text ms-1">Kelola Data Jenis</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/alat">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <ion-icon name="caret-forward-outline"></ion-icon>
            </div>
            <span class="nav-link-text ms-1">Kelola Data Alat</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/peminjaman">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <ion-icon name="caret-forward-outline"></ion-icon>
            </div>
            <span class="nav-link-text ms-1">Kelola Data Peminjaman</span>
          </a>
        </li>
        
        {{-- Another Section --}}

        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Pengaturan Akun</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/petugas/profile">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <ion-icon name="person-outline"></ion-icon>
            </div>
            <span class="nav-link-text ms-1">Profile</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/logout">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <ion-icon name="exit-outline"></ion-icon>
            </div>
            <span class="nav-link-text ms-1">Log Out</span>
          </a>
        </li>
      </ul>
  </div>
  </aside>

@elseif (Auth::user()->level === 'Petugas')
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0">
        <img src="{{ asset('/assets/img/Logo Peminjaman Alat Praktik - Aldy Aditia Hidayat.png') }}" class="navbar-brand-img h-100">
        <span class="ms-1 font-weight-bold">Peminjaman Alat</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" href="/dashboard">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <ion-icon name="home-outline"></ion-icon>
            </div>
            <span class="nav-link-text ms-1">Dashboard Petugas</span>
          </a>
        <li class="nav-item">
          <a class="nav-link" href="/peminjaman">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <ion-icon name="caret-forward-outline"></ion-icon>
            </div>
            <span class="nav-link-text ms-1">Kelola Data Peminjaman</span>
          </a>
        </li>
        
        {{-- Another Section --}}

        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Pengaturan Akun</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/petugas/profile">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <ion-icon name="person-outline"></ion-icon>
            </div>
            <span class="nav-link-text ms-1">Profile</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/logout">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <ion-icon name="exit-outline"></ion-icon>
            </div>
            <span class="nav-link-text ms-1">Log Out</span>
          </a>
        </li>
      </ul>
  </div>
  </aside>

@else
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0">
        <img src="{{ asset('/assets/img/Logo Peminjaman Alat Praktik - Aldy Aditia Hidayat.png') }}" class="navbar-brand-img h-100">
        <span class="ms-1 font-weight-bold">Peminjaman Alat</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" href="/dashboard">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <ion-icon name="home-outline"></ion-icon>
            </div>
            <span class="nav-link-text ms-1">Dashboard Member</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/member/index_borrow">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <ion-icon name="caret-forward-outline"></ion-icon>
            </div>
            <span class="nav-link-text ms-1">Pinjam Alat</span>
          </a>
        </li>

        {{-- Another Section --}}

        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Pengaturan Akun</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/member/profile">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <ion-icon name="person-outline"></ion-icon>
            </div>
            <span class="nav-link-text ms-1">Profile</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/logout">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <ion-icon name="exit-outline"></ion-icon>
            </div>
            <span class="nav-link-text ms-1">Log Out</span>
          </a>
        </li>
      </ul>
  </div>
  </aside>
@endif