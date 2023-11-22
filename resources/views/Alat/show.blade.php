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
                                <h3>Form Edit Data Alat</h3>
                            </div>
                            <div class="card-body">
                                <form action="/alat/{{$alat->id}}/update" method="post">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label>Nama Alat</label>
                                        <input type="text" name="nama_alat" class="form-control" value="{{$alat->nama_alat}}"  placeholder="{{$alat->nama_alat}}">
                                        @if ($errors->first('nama_alat'))
                                            <p class="text-danger">* {{$errors->first('nama_alat')}}</p>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Jenis</label>
                                        <select name="id_jenis" class="form-control">
                                            <option value="{{$alat->id_jenis}}">Default: {{$alat->Jenis->nama_jenis}} | {{$alat->Jenis->keterangan}}</option>
                                            @foreach ($jenis as $j)
                                                <option value="{{$j->id}}">{{$j->nama_jenis}} | {{$j->keterangan}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Stok</label>
                                        <input type="text" name="stok" class="form-control" value="{{$alat->stok}}" placeholder="{{$alat->stok}}">
                                        @if ($errors->first('stok'))
                                            <p class="text-danger">* {{$errors->first('stok')}}</p>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Denda</label>
                                        <input type="text" name="denda" class="form-control" value="{{$alat->denda}}" placeholder="{{$alat->denda}}">
                                        @if ($errors->first('denda'))
                                            <p class="text-danger">* {{$errors->first('denda')}}</p>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Batas Pinjam</label>
                                        <input type="text" name="batas_pinjam" class="form-control"  value="{{$alat->batas_pinjam}}" placeholder="{{$alat->batas_pinjam}}">
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