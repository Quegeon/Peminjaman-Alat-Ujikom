<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Jenis;

class Alat extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_jenis',
        'nama_alat',
        'stok',
        'denda',
        'batas_pinjam'
    ];

    public function Jenis ()
    {
        return $this->belongsTo(Jenis::class, 'id_jenis', 'id');
    }

    public function Alat () {
        return $this->hasMany(User::class, 'id_alat', 'id');
    }
}
