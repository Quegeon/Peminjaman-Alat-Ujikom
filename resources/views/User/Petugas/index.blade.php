@extends('layout.master')
@section('title','Halaman Kelola Data Petugas')
@section('content')
    <div class="content-wrapper">
        <br>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        @if (session()->has('status'))
                            <div class="alert alert-{{session('status.type')}}">
                                <div class="text-bolder text-white pb-1">{{session('status.message')}}</div>
                            </div>
                        @endif
                        <div class="card">
                            <div class="card-header">
                                <h3>Kelola Data Petugas</h3>
                                <a href="/petugas/create" class="btn btn-primary">Tambah Data</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-responsive align-content-center" id="example">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Username</th>
                                                <th>No Telp</th>
                                                <th>Email</th>
                                                <th>Level</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($petugas as $p)
                                                <tr>
                                                    <td>
                                                        <div class="d-flex px-3 py-1">
                                                            {{$loop->iteration}}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex px-3 py-1">
                                                            {{$p->nama}}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex px-3 py-1">
                                                            {{$p->username}}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex px-3 py-1">
                                                            {{$p->no_telp}}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex px-3 py-1">
                                                            {{$p->email}}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex px-3 py-1">
                                                            {{$p->level}}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex px-3 py-1">
                                                            <div class="me-1">
                                                                <a href="/petugas/{{$p->id}}/show" class="btn btn-warning">Edit</a>
                                                                <a href="/petugas/{{$p->id}}/destroy" class="btn btn-danger" data-confirm-delete="true">Hapus</a>
                                                                <a href="/petugas/{{$p->id}}/show/password" class="btn btn-warning">Ubah Password</a>
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