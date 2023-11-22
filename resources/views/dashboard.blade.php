@extends('layout.master')
@section('title','Halaman Dashboard')
@section('content')
    @if (Auth::user()->level === 'Admin')
      {{-- Navbar --}}
      <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
        <div class="container-fluid py-1 px-3">
          <nav aria-label="breadcrumb">
            <h4 class="font-weight-bolder mb-0">Dashboard Admin</h4>
          </nav>
          
          <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
              {{-- Leave This Empty --}}
            </div>
            <ul class="navbar-nav  justify-content-end">
              <li class="nav-item d-flex align-items-center">
                <a class="nav-link text-body font-weight-bold px-0">
                  <i class="fa fa-user me-sm-1"></i>
                  <span class="d-sm-inline d-none">
                    {{ Auth::user()->username }}
                  </span>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      {{-- End Navbar --}}

      <div class="container-fluid py-4">
        <div class="row">
          <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
              <div class="card-body p-3">
                <div class="row">
                  <div class="col-8">
                    <div class="numbers">
                      <a href="/member" class="text-sm mb-0 text-capitalize font-weight-bold text-info">Jumlah Member</a>
                      <h5 class="font-weight-bolder mb-0">
                        {{$sum_member}}
                      </h5>
                    </div>
                  </div>
                  <div class="col-4 text-end">
                    <div class="icon icon-shape bg-gradient-info shadow text-center border-radius-md">
                      <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
              <div class="card-body p-3">
                <div class="row">
                  <div class="col-8">
                    <div class="numbers">
                      <a href="/" class="text-sm mb-0 text-capitalize font-weight-bold text-info">Jumlah Alat</a>
                      <h5 class="font-weight-bolder mb-0">
                        {{$sum_alat}}
                      </h5>
                    </div>
                  </div>
                  <div class="col-4 text-end">
                    <div class="icon icon-shape bg-gradient-info shadow text-center border-radius-md">
                      <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
              <div class="card-body p-3">
                <div class="row">
                  <div class="col-8">
                    <div class="numbers">
                      <a href="/peminjaman" class="text-sm mb-0 text-capitalize font-weight-bold text-info">Jumlah Peminjaman</a>
                      <h5 class="font-weight-bolder mb-0">
                        {{$sum_peminjaman}}
                      </h5>
                    </div>
                  </div>
                  <div class="col-4 text-end">
                    <div class="icon icon-shape bg-gradient-info shadow text-center border-radius-md">
                      <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <br>
        
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>Histori Transaksi</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-responsive align-content-center" id="example">
                    <thead>
                      <tr>
                          <th>No</th>
                          <th>Member</th>
                          <th>Alat</th>
                          <th>Tanggal Pinjam</th>
                          <th>Tanggal Kembali</th>
                          <th>Jumlah Pinjam</th>
                          <th>Denda</th>
                          <th>Batas Pinjam</th>
                          <th>Total Denda</th>
                          <th>Petugas</th>
                          <th>Status</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach ($history as $h)
                          <tr>
                              <td>
                                  <div class="d-flex px-3 py-1">
                                      {{$loop->iteration}}
                                  </div>
                              </td>
                              <td>
                                  <div class="d-flex px-3 py-1">
                                      {{$h->id_member}} | {{$h->Member->username}}
                                  </div>
                              </td>
                              <td>
                                  <div class="d-flex px-3 py-1">
                                      {{$h->Alat->nama_alat}} | {{$h->Alat->Jenis->nama_jenis}}
                                  </div>
                              </td>
                              <td>
                                  <div class="d-flex px-3 py-1">
                                      {{$h->tanggal_pinjam}}
                                  </div>
                              </td>
                              <td>
                                  <div class="d-flex px-3 py-1">
                                      {{$h->tanggal_kembali}}
                                  </div>
                              </td>
                              <td>
                                  <div class="d-flex px-3 py-1">
                                      {{$h->jumlah_pinjam}}
                                  </div>
                              </td>
                              <td>
                                  <div class="d-flex px-3 py-1">
                                      Rp. {{ number_format($h->Alat->denda,2,',','.') }}
                                  </div>
                              </td>
                              <td>
                                  <div class="d-flex px-3 py-1">
                                      {{$h->Alat->batas_pinjam}} Hari
                                  </div>
                              </td>
                              <td>
                                  <div class="d-flex px-3 py-1">
                                      Rp. {{ number_format($h->total_denda,2,',','.') }}
                                  </div>
                              </td>
                              <td>
                                  <div class="d-flex px-3 py-1">
                                      {{$h->Petugas->username}} | {{$h->Petugas->nama}}
                                  </div>
                              </td>
                              <td>
                                  <div class="d-flex px-3 py-1">
                                      {{$h->status}}
                                  </div>
                              </td>
                          </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    @elseif (Auth::user()->level === 'Petugas')
      {{-- Navbar --}}
      <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
        <div class="container-fluid py-1 px-3">
          <nav aria-label="breadcrumb">
            <h4 class="font-weight-bolder mb-0">Dashboard Petugas</h4>
          </nav>
          
          <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
              {{-- Leave This Empty --}}
            </div>
            <ul class="navbar-nav  justify-content-end">
              <li class="nav-item d-flex align-items-center">
                <a class="nav-link text-body font-weight-bold px-0">
                  <i class="fa fa-user me-sm-1"></i>
                  <span class="d-sm-inline d-none">
                    {{ Auth::user()->username }}
                  </span>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      {{-- End Navbar --}}

      <div class="container-fluid py-4">
        <div class="row">
          <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
              <div class="card-body p-3">
                <div class="row">
                  <div class="col-8">
                    <div class="numbers">
                      <a href="/peminjaman" class="text-sm mb-0 text-capitalize font-weight-bold text-info">Jumlah Peminjaman</a>
                      <h5 class="font-weight-bolder mb-0">
                        {{$sum_peminjaman}}
                      </h5>
                    </div>
                  </div>
                  <div class="col-4 text-end">
                    <div class="icon icon-shape bg-gradient-info shadow text-center border-radius-md">
                      <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <br>
        
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>Histori Transaksi</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-responsive align-content-center" id="example">
                    <thead>
                      <tr>
                          <th>No</th>
                          <th>Member</th>
                          <th>Alat</th>
                          <th>Tanggal Pinjam</th>
                          <th>Tanggal Kembali</th>
                          <th>Jumlah Pinjam</th>
                          <th>Denda</th>
                          <th>Batas Pinjam</th>
                          <th>Total Denda</th>
                          <th>Petugas</th>
                          <th>Status</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach ($history as $h)
                          <tr>
                              <td>
                                  <div class="d-flex px-3 py-1">
                                      {{$loop->iteration}}
                                  </div>
                              </td>
                              <td>
                                  <div class="d-flex px-3 py-1">
                                      {{$h->id_member}} | {{$h->Member->username}}
                                  </div>
                              </td>
                              <td>
                                  <div class="d-flex px-3 py-1">
                                      {{$h->Alat->nama_alat}} | {{$h->Alat->Jenis->nama_jenis}}
                                  </div>
                              </td>
                              <td>
                                  <div class="d-flex px-3 py-1">
                                      {{$h->tanggal_pinjam}}
                                  </div>
                              </td>
                              <td>
                                  <div class="d-flex px-3 py-1">
                                      {{$h->tanggal_kembali}}
                                  </div>
                              </td>
                              <td>
                                  <div class="d-flex px-3 py-1">
                                      {{$h->jumlah_pinjam}}
                                  </div>
                              </td>
                              <td>
                                  <div class="d-flex px-3 py-1">
                                      Rp. {{ number_format($h->Alat->denda,2,',','.') }}
                                  </div>
                              </td>
                              <td>
                                  <div class="d-flex px-3 py-1">
                                      {{$h->Alat->batas_pinjam}} Hari
                                  </div>
                              </td>
                              <td>
                                  <div class="d-flex px-3 py-1">
                                      Rp. {{ number_format($h->total_denda,2,',','.') }}
                                  </div>
                              </td>
                              <td>
                                  <div class="d-flex px-3 py-1">
                                      {{$h->Petugas->username}} | {{$h->Petugas->nama}}
                                  </div>
                              </td>
                              <td>
                                  <div class="d-flex px-3 py-1">
                                      {{$h->status}}
                                  </div>
                              </td>
                          </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    @else
      {{-- Navbar --}}
      <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
        <div class="container-fluid py-1 px-3">
          <nav aria-label="breadcrumb">
            <h4 class="font-weight-bolder mb-0">Dashboard Member</h4>
          </nav>
          
          <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
              {{-- Leave This Empty --}}
            </div>
            <ul class="navbar-nav  justify-content-end">
              <li class="nav-item d-flex align-items-center">
                <a class="nav-link text-body font-weight-bold px-0">
                  <i class="fa fa-user me-sm-1"></i>
                  <span class="d-sm-inline d-none">
                    {{ Auth::user()->username }}
                  </span>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      {{-- End Navbar --}}

      <div class="container-fluid py-4">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>Histori Transaksi</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-responsive align-content-center" id="example">
                    <thead>
                      <tr>
                          <th>No</th>
                          <th>Member</th>
                          <th>Alat</th>
                          <th>Tanggal Pinjam</th>
                          <th>Tanggal Kembali</th>
                          <th>Jumlah Pinjam</th>
                          <th>Denda</th>
                          <th>Batas Pinjam</th>
                          <th>Total Denda</th>
                          <th>Petugas</th>
                          <th>Status</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach ($history as $h)
                          <tr>
                              <td>
                                  <div class="d-flex px-3 py-1">
                                      {{$loop->iteration}}
                                  </div>
                              </td>
                              <td>
                                  <div class="d-flex px-3 py-1">
                                      {{$h->id_member}} | {{$h->Member->username}}
                                  </div>
                              </td>
                              <td>
                                  <div class="d-flex px-3 py-1">
                                      {{$h->Alat->nama_alat}} | {{$h->Alat->Jenis->nama_jenis}}
                                  </div>
                              </td>
                              <td>
                                  <div class="d-flex px-3 py-1">
                                      {{$h->tanggal_pinjam}}
                                  </div>
                              </td>
                              <td>
                                  <div class="d-flex px-3 py-1">
                                      {{$h->tanggal_kembali}}
                                  </div>
                              </td>
                              <td>
                                  <div class="d-flex px-3 py-1">
                                      {{$h->jumlah_pinjam}}
                                  </div>
                              </td>
                              <td>
                                  <div class="d-flex px-3 py-1">
                                      Rp. {{ number_format($h->Alat->denda,2,',','.') }}
                                  </div>
                              </td>
                              <td>
                                  <div class="d-flex px-3 py-1">
                                      {{$h->Alat->batas_pinjam}} Hari
                                  </div>
                              </td>
                              <td>
                                  <div class="d-flex px-3 py-1">
                                      Rp. {{ number_format($h->total_denda,2,',','.') }}
                                  </div>
                              </td>
                              <td>
                                  <div class="d-flex px-3 py-1">
                                      {{$h->Petugas->username}} | {{$h->Petugas->nama}}
                                  </div>
                              </td>
                              <td>
                                  <div class="d-flex px-3 py-1">
                                      {{$h->status}}
                                  </div>
                              </td>
                          </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    @endif    
@endsection