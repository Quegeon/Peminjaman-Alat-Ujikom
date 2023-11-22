@extends('layout.master')
@section('title','Halaman Tambah Data Alat')
@section('content')
    <div class="content-wrapper">
        <br>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3>Form Tambah Data Alat</h3>
                            </div>
                            <div class="card-body">
                                <form action="/alat/store" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label>Nama Alat</label>
                                        <input type="text" name="nama_alat" class="form-control" placeholder="Masukkan Nama Alat">
                                        @if ($errors->first('nama_alat'))
                                            <p class="text-danger">* {{$errors->first('nama_alat')}}</p>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Jenis</label>
                                        <select name="id_jenis" class="form-control">
                                            @foreach ($jenis as $j)
                                                <option value="{{$j->id}}">{{$j->nama_jenis}} | {{$j->keterangan}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Stok</label>
                                        <input type="text" name="stok" class="form-control" placeholder="Masukkan Stok">
                                        @if ($errors->first('stok'))
                                            <p class="text-danger">* {{$errors->first('stok')}}</p>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Denda</label>
                                        <input type="text" name="denda" class="form-control" placeholder="Masukkan Denda">
                                        @if ($errors->first('denda'))
                                            <p class="text-danger">* {{$errors->first('denda')}}</p>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Batas Pinjam</label>
                                        <input type="text" name="batas_pinjam" class="form-control" placeholder="Masukkan Batas Pinjam">
                                        @if ($errors->first('batas_pinjam'))
                                            <p class="text-danger">* {{$errors->first('batas_pinjam')}}</p>
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
