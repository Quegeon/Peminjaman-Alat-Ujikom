<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenis extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_jenis',
        'keterangan'
    ];

    public function Jenis ()
    {
        return $this->hasMany(Jenis::class, 'id_jenis', 'id');
    }
}
