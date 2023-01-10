<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{

    protected $fillable = [
        'nama_admin',
        'alamat',
        'no_telp',
        'email',
        'password',
    ];
}
