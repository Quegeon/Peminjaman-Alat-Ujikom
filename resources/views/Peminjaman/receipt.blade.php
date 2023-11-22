<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Resi Peminjaman Alat Praktik</title>
    <style>
        .grid-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 50px;
            margin-left: 5%;
            margin-right: 5%;
        }

        .grid-col-1 {
            text-align: left;
        }

        .grid-col-2 {
            text-align: right;
        }

    </style>
</head>
<body onload="window.print()">
    <center>
        <h3>Resi Peminjaman</h3>
    </center>
    <div class="grid-container">
        <div class="grid-col-1">
            <h4>Member :</h4>
            <h4>Alat :</h4>
            <h4>Tanggal Pinjam :</h4>
            <h4>Tanggal Kembali :</h4>
            <h4>Jumlah Pinjam :</h4>
            <h4>Denda :</h4>
            <h4>Batas Pinjam :</h4>
            <h4>Total Denda :</h4>
            <h4>Petugas :</h4>
            <h4>Status :</h4>
        </div>
        <div class="grid-col-2">
            <h4>{{$peminjaman->id_member}} | {{$peminjaman->Member->username}}</h4>
            <h4>{{$peminjaman->Alat->nama_alat}} | {{$peminjaman->Alat->Jenis->nama_jenis}}</h4>
            <h4>{{$peminjaman->tanggal_pinjam}}</h4>
            <h4>{{$peminjaman->tanggal_kembali}}</h4>
            <h4>{{$peminjaman->jumlah_pinjam}}</h4>
            <h4>Rp. {{ number_format($peminjaman->denda,2,',','.') }}</h4>
            <h4>{{$peminjaman->batas_pinjam}} Hari</h4>
            <h4>Rp. {{ number_format($peminjaman->total_denda,2,',','.') }}</h4>
            <h4>{{$peminjaman->Petugas->username}} | {{$peminjaman->Petugas->nama}}</h4>
            <h4>{{$peminjaman->status}}</h4>
        </div>
    </div>
</body>
</html>