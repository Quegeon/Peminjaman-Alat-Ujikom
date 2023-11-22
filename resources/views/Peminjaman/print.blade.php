<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print Laporan Peminjaman</title>
</head>
<body onload="window.print()">
    <center>
        <h3>Laporan Peminjaman Alat Praktik</h3>
        <hr>
        <table border="1px">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Member</th>
                    <th>Alat</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Jumlah Pinjam</th>
                    <th>Denda</th>
                    <th>Batas Pinjam</th>
                    <th>Total Denda</th>
                    <th>Petugas</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($peminjaman as $p)
                    <tr>
                        <td>
                            <div class="d-flex px-3 py-1">
                                {{$loop->iteration}}
                            </div>
                        </td>
                        <td>
                            <div class="d-flex px-3 py-1">
                                {{$p->id_member}} | {{$p->Member->username}}
                            </div>
                        </td>
                        <td>
                            <div class="d-flex px-3 py-1">
                                {{$p->Alat->nama_alat}} | {{$p->Alat->Jenis->nama_jenis}}
                            </div>
                        </td>
                        <td>
                            <div class="d-flex px-3 py-1">
                                {{$p->tanggal_pinjam}}
                            </div>
                        </td>
                        <td>
                            <div class="d-flex px-3 py-1">
                                {{$p->tanggal_kembali}}
                            </div>
                        </td>
                        <td>
                            <div class="d-flex px-3 py-1">
                                {{$p->jumlah_pinjam}}
                            </div>
                        </td>
                        <td>
                            <div class="d-flex px-3 py-1">
                                Rp. {{ number_format($p->denda,2,',','.') }}
                            </div>
                        </td>
                        <td>
                            <div class="d-flex px-3 py-1">
                                {{$p->batas_pinjam}}
                            </div>
                        </td>
                        <td>
                            <div class="d-flex px-3 py-1">
                                Rp. {{ number_format($p->total_denda,2,',','.') }}
                            </div>
                        </td>
                        <td>
                            <div class="d-flex px-3 py-1">
                                {{$p->Petugas->username}} | {{$p->Petugas->nama}}
                            </div>
                        </td>
                        <td>
                            <div class="d-flex px-3 py-1">
                                {{$p->status}}
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </center>
</body>
</html>