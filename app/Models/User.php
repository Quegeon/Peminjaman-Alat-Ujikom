<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'id_member',
        'nama',
        'username',
        'password',
        'no_telp',
        'email',
        'alamat',
        'level'
    ];

    protected $hidden = [
        'password'
    ];

    public function Member () {
        return $this->hasMany(User::class, 'id_member', 'id_member');
    }

    public function Petugas () {
        return $this->hasMany(User::class, 'id_petugas', 'id');
    }
}
