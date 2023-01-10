<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    protected $fillable = [
        'nama_anggota',
        'nim',
        'no_telp',
        'email',
        'password',
    ];
}
