<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Alat;

class Peminjaman extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_member',
        'id_alat',
        'id_petugas',
        'tanggal_pinjam',
        'tanggal_kembali',
        'jumlah_pinjam',
        'total_denda',
        'status'
    ];

    public function Member () {
        return $this->belongsTo(User::class, 'id_member', 'id_member');
    }

    public function Petugas () {
        return $this->belongsTo(User::class, 'id_petugas', 'id');
    }
    
    public function Alat () {
        return $this->belongsTo(Alat::class, 'id_alat', 'id');
    }
}
