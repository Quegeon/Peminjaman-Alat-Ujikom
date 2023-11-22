@extends('layout.master')
@section('title','Halaman Tambah Data Peminjaman')
@section('content')
    <div class="content-wrapper">
        <br>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3>Form Tambah Data Peminjaman</h3>
                            </div>
                            <div class="card-body">
                                <form action="/peminjaman/store" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label>Member</label>
                                        <select name="id_member" class="form-control">
                                            @foreach ($member as $m)
                                                <option value="{{$m->id_member}}">{{$m->id_member}} | {{$m->username}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Alat</label>
                                        <select name="id_alat" class="form-control">
                                            @foreach ($alat as $a)
                                                <option value="{{$a->id}}">{{$a->nama_alat}} | {{$a->Jenis->nama_jenis}} | {{ $a->batas_pinjam }} Hari | Rp. {{ number_format($a->denda,2,',','.') }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Jumlah Pinjam</label>
                                        <input type="text" name="jumlah_pinjam" class="form-control" placeholder="Masukkan Jumlah Pinjam">
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