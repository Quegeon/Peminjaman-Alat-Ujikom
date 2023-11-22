@extends('layout.master')
@section('title','Halaman Tambah Data Jenis')
@section('content')
    <div class="content-wrapper">
        <br>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3>Form Tambah Data Jenis</h3>
                            </div>
                            <div class="card-body">
                                <form action="/jenis/store" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label>Nama Jenis</label>
                                        <input type="text" name="nama_jenis" class="form-control" placeholder="Masukkan Nama Jenis">
                                        @if ($errors->first('nama_jenis'))
                                            <p class="text-danger">* {{$errors->first('nama_jenis')}}</p>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Keterangan</label>
                                        <input type="text" name="keterangan" class="form-control" placeholder="Masukkan Keterangan">
                                        @if ($errors->first('keterangan'))
                                            <p class="text-danger">* {{$errors->first('keterangan')}}</p>
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