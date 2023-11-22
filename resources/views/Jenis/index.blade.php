@extends('layout.master')
@section('title','Halaman Kelola Data Jenis')
@section('content')
    <div class="content-wrapper">
        <br>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3>Kelola Data Jenis</h3>
                                <a href="/jenis/create" class="btn btn-primary">Tambah Data</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-responsive align-content-center" id="example">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Jenis</th>
                                                <th>Keterangan</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($jenis as $j)
                                                <tr>
                                                    <td>
                                                        <div class="d-flex px-3 py-1">
                                                            {{$loop->iteration}}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex px-3 py-1">
                                                            {{$j->nama_jenis}}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex px-3 py-1">
                                                            {{$j->keterangan}}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex px-3 py-1">
                                                            <div class="me-1">
                                                                <a href="/jenis/{{$j->id}}/show" class="btn btn-warning">Edit</a>
                                                                <a href="/jenis/{{$j->id}}/destroy" class="btn btn-danger" data-confirm-delete="true">Hapus</a>
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