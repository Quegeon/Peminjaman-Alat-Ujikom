@extends('layout.master')
@section('title','Halaman Edit Data Member')
@section('content')
    <div class="content-wrapper">
        <br>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3>Form Edit Data Member</h3>
                            </div>
                            <div class="card-body">
                                <form action="/member/{{$member->id_member}}/update" method="post">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" name="nama" class="form-control" value="{{$member->nama}}" placeholder="{{$member->nama}}">
                                        @if ($errors->first('nama'))
                                            <p class="text-danger">* {{$errors->first('nama')}}</p>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" name="username" class="form-control" value="{{$member->username}}" placeholder="{{$member->username}}">
                                        @if ($errors->first('username'))
                                            <p class="text-danger">* {{$errors->first('username')}}</p>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>No Telp</label>
                                        <input type="text" name="no_telp" class="form-control" value="{{$member->no_telp}}" placeholder="{{$member->no_telp}}">
                                        @if ($errors->first('no_telp'))
                                        <p class="text-danger">* {{$errors->first('no_telp')}}</p>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" name="email" class="form-control" value="{{$member->email}}" placeholder="{{$member->email}}">
                                        @if ($errors->first('email'))
                                        <p class="text-danger">* {{$errors->first('email')}}</p>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <input type="text" name="alamat" class="form-control" value="{{$member->alamat}}" placeholder="{{$member->alamat}}">
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