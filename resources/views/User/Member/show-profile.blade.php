@extends('layout.master')
@section('title','Halaman Edit Profile {{ Auth::user()->username }}')
@section('content')
    <br>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>Form Edit Profile</h3>    
                        </div>
                        <div class="card-body">
                            <form action="/member/change_profile" method="post">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" name="nama" class="form-control" value="{{ Auth::user()->nama }}" placeholder="{{ Auth::user()->nama }}">
                                    @if ($errors->first('nama'))
                                        <p class="text-danger">* {{ $errors->first('nama') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" name="username" class="form-control" value="{{ Auth::user()->username }}" placeholder="{{ Auth::user()->username }}">
                                    @if ($errors->first('username'))
                                        <p class="text-danger">* {{ $errors->first('username') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>No Telp</label>
                                    <input type="text" name="no_telp" class="form-control" value="{{ Auth::user()->no_telp }}" placeholder="{{ Auth::user()->no_telp }}">
                                    @if ($errors->first('no_telp'))
                                        <p class="text-danger">* {{ $errors->first('no_telp') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" name="email" class="form-control" value="{{ Auth::user()->email }}" placeholder="{{ Auth::user()->email }}">
                                    @if ($errors->first('email'))
                                        <p class="text-danger">* {{ $errors->first('email') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <input type="text" name="alamat" class="form-control" value="{{ Auth::user()->alamat }}" placeholder="{{ Auth::user()->alamat }}">
                                    @if ($errors->first('alamat'))
                                        <p class="text-danger">* {{ $errors->first('alamat') }}</p>
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
@endsection