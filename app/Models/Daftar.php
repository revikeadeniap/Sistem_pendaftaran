<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Daftar extends Model
{
    protected $fillable = [
        'id_anggota',
        'id_divisi',
        'alasan',
        'pengalaman_organisasi',
    ];
}
