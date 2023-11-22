@extends('layout.master')
@section('title','Halaman Kelola Data Peminjaman')
@section('content')
    <div class="content-wrapper">
        <br>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3>Kelola Data Peminjaman</h3>
                                <a href="/peminjaman/create" class="btn btn-primary">Tambah Data</a>
                                <a href="/peminjaman/print" class="btn btn-secondary">Cetak</a>
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
                                                <th>Total Denda</th>
                                                <th>Petugas</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($peminjaman as $p)
                                                <tr>
                                                    <td>
                                                        <div class="d-flex px-3 py-1">
                                                            {{$loop->iteration}}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex px-3 py-1">
                                                            {{$p->id_member}} | {{$p->Member->username}}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex px-3 py-1">
                                                            {{$p->Alat->nama_alat}} | {{$p->Alat->Jenis->nama_jenis}}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex px-3 py-1">
                                                            {{$p->tanggal_pinjam}}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex px-3 py-1">
                                                            {{$p->tanggal_kembali}}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex px-3 py-1">
                                                            {{$p->jumlah_pinjam}}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex px-3 py-1">
                                                            Rp. {{ number_format($p->total_denda,2,',','.') }}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex px-3 py-1">
                                                            {{$p->Petugas->username}} | {{$p->Petugas->nama}}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex px-3 py-1">
                                                            {{$p->status}}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex px-3 py-1">
                                                            <div class="me-1">
                                                                <a href="/peminjaman/{{$p->id}}/show" class="btn btn-warning" onclick="return confirm('Batas Waktu Optimal Pengeditan 30 Menit Setelah Data Diinputkan')">Edit</a>
                                                                <a href="/peminjaman/{{$p->id}}/destroy" class="btn btn-danger" data-confirm-delete="true">Hapus</a>
                                                                <a href="/peminjaman/{{$p->id}}/change_status" class="btn btn-info">
                                                                    @if ($p->status === 'Pinjam')
                                                                        Kembali
                                                                    @elseif ($p->status === 'Kembali')
                                                                        Pinjam
                                                                    @endif
                                                                </a>
                                                                <a href="/peminjaman/{{$p->id}}/receipt" class="btn btn-success">Resi</a>
                                                            </div>
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
        </section>    
    </div>    
@endsection