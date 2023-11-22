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
                                <form action="/peminjaman/{{$peminjaman->id}}/update" method="post">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label>Member</label>
                                        <select name="id_member" class="form-control">
                                            <option value="{{$peminjaman->id_member}}">Default: {{$peminjaman->id_member}} | {{$peminjaman->Member->username}}</option>
                                            @foreach ($member as $m)
                                                <option value="{{$m->id_member}}">{{$m->id_member}} | {{$m->username}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Alat</label>
                                        <select name="id_alat" class="form-control">
                                            <option value="{{$peminjaman->id_alat}}">{{$peminjaman->Alat->nama_alat}} | {{$peminjaman->Alat->Jenis->nama_jenis}} | {{ $peminjaman->Alat->batas_pinjam }} Hari | Rp. {{ number_format($peminjaman->Alat->denda,2,',','.') }}</option>
                                            @foreach ($alat as $a)
                                              <option value="{{$a->id}}">{{$a->nama_alat}} | {{$a->Jenis->nama_jenis}} | {{ $a->batas_pinjam }} Hari | Rp. {{ number_format($a->denda,2,',','.') }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Pinjam</label>
                                        <input type="date" name="tanggal_pinjam" class="form-control" value="{{$peminjaman->tanggal_pinjam}}">
                                        @if ($errors->first('jumlah_pinjam'))
                                            <p class="text-danger">* {{$errors->first('jumlah_pinjam')}}</p>
                                        @endif
                                    </div>
                                    @if ($peminjaman->status === 'Kembali')
                                        <div class="form-group">
                                            <label>Tanggal Kembali</label>
                                            <input type="date" name="tanggal_kembali" class="form-control" value="{{$peminjaman->tanggal_kembali}}">
                                            @if ($errors->first('jumlah_pinjam'))
                                                <p class="text-danger">* {{$errors->first('jumlah_pinjam')}}</p>
                                            @endif
                                        </div>
                                    @endif
                                    @if ($peminjaman->status === 'Pinjam')
                                        <div class="form-group">
                                            <label>Jumlah Pinjam</label>
                                            <input type="text" name="jumlah_pinjam" class="form-control" value="{{$peminjaman->jumlah_pinjam}}" placeholder="{{$peminjaman->jumlah_pinjam}}">
                                            @if ($errors->first('jumlah_pinjam'))
                                                <p class="text-danger">* {{$errors->first('jumlah_pinjam')}}</p>
                                            @endif
                                        </div>
                                    @else
                                        <input type="hidden" name="jumlah_pinjam" value="{{$peminjaman->jumlah_pinjam}}">
                                    @endif
                                    <div class="form-group">
                                        <label>Petugas</label>
                                        <select name="id_petugas" class="form-control">
                                            <option value="{{$peminjaman->id_petugas}}">Default: {{$peminjaman->Petugas->username}} | {{$peminjaman->Petugas->nama}}</option>
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