<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IzinKaryawan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function Karyawan()
    {
        return $this->hasMany(Karyawan::class);
    }

    public function JenisIzin()
    {
        return $this->belongsTo(JenisIzin::class);
    }
}
