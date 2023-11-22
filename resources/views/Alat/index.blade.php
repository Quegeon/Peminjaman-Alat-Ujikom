@extends('layout.master')
@section('title','Halaman Kelola Data Alat')
@section('content')
    <div class="content-wrapper">
        <br>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3>Kelola Data Alat</h3>
                                <a href="/alat/create" class="btn btn-primary">Tambah Data</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-responsive align-content-center" id="example">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Alat</th>
                                                <th>Jenis</th>
                                                <th>Stok</th>
                                                <th>Denda</th>
                                                <th>Batas Pinjam</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($alat as $a)
                                                <tr>
                                                    <td>
                                                        <div class="d-flex px-3 py-1">
                                                            {{$loop->iteration}}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex px-3 py-1">
                                                            {{$a->nama_alat}}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex px-3 py-1">
                                                            {{$a->Jenis->nama_jenis}}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex px-3 py-1">
                                                            {{$a->stok}}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex px-3 py-1">
                                                            Rp. {{number_format($a->denda,2,',','.')}}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex px-3 py-1">
                                                            {{$a->batas_pinjam}} Hari
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex px-3 py-1">
                                                            <div class="me-1">
                                                                <a href="/alat/{{$a->id}}/show" class="btn btn-warning">Edit</a>
                                                                <a href="/alat/{{$a->id}}/destroy" class="btn btn-danger" data-confirm-delete="true">Hapus</a>
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