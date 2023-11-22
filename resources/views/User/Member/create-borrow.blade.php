@extends('layout.master')
@section('title','Halaman Pinjam Alat')
@section('content')
    <div class="content-wrapper">
        <br>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3>Form Pinjam Alat</h3>
                            </div>
                            <div class="card-body">
                                <form action="/member/borrow" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label>Nama Alat</label>
                                        <input type="text" class="form-control" placeholder="{{ $alat->nama_alat }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label>Jenis</label>
                                        <input type="text" class="form-control" placeholder="{{ $alat->Jenis->nama_jenis }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label>Stok</label>
                                        <input type="text" class="form-control" placeholder="{{ $alat->stok }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label>Denda</label>
                                        <input type="text" class="form-control" placeholder="{{ $alat->denda }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label>Batas Pinjam</label>
                                        <input type="text" class="form-control" placeholder="{{ $alat->batas_pinjam }}" disabled>
                                    </div>                                    
                                    <div class="form-group">
                                        <label>Jumlah Pinjam</label>
                                        <input type="text" class="form-control" name="jumlah_pinjam" placeholder="Masukkan Jumlah Pinjam">
                                        @if ($errors->first('jumlah_pinjam'))
                                            <p class="text-danger">* {{$errors->first('jumlah_pinjam')}}</p>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Petugas</label>
                                        <select name="id_petugas" class="form-control">
                                            @foreach ($petugas as $p)
                                                <option value="{{$p->id}}">{{$p->username}} | {{$p->nama}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <input type="hidden" name="id_alat" value="{{ $alat->id }}">
                                    <input type="hidden" name="id_member" value="{{ Auth::user()->id_member }}">

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
