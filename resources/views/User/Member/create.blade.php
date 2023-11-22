@extends('layout.master')
@section('title','Halaman Tambah Data Member')
@section('content')
    <div class="content-wrapper">
        <br>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3>Form Tambah Data Member</h3>
                            </div>
                            <div class="card-body">
                                <form action="/member/store" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama">
                                        @if ($errors->first('nama'))
                                            <p class="text-danger">* {{$errors->first('nama')}}</p>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" name="username" class="form-control" placeholder="Masukkan Username">
                                        @if ($errors->first('username'))
                                            <p class="text-danger">* {{$errors->first('username')}}</p>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" name="password" class="form-control" placeholder="Masukkan Password">
                                        @if ($errors->first('password'))
                                            <p class="text-danger">* {{$errors->first('password')}}</p>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>No Telp</label>
                                        <input type="text" name="no_telp" class="form-control" placeholder="Masukkan No Telp">
                                        @if ($errors->first('no_telp'))
                                            <p class="text-danger">* {{$errors->first('no_telp')}}</p>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" name="email" class="form-control" placeholder="Masukkan Email">
                                        @if ($errors->first('email'))
                                            <p class="text-danger">* {{$errors->first('email')}}</p>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <input type="text" name="alamat" class="form-control" placeholder="Masukkan Alamat (Opsional)">
                                        @if ($errors->first('alamat'))
                                            <p class="text-danger">* {{$errors->first('alamat')}}</p>
                                        @endif
                                    </div>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                </form>
                            </div>    
                        </div>    
                    </div>    
                </div>    
            </div>    
        </section>    
    </div>    
@endsection