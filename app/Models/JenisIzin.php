<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisIzin extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function Karyawan()
    {
        return $this->hasMany(Karyawan::class);
    }

    public function izinkaryawan()
    {
        return $this->hasMany(IzinKaryawan::class);
    }
}
