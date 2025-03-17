<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function izinkaryawan()
    {
        return $this->belongsTo(IzinKaryawan::class);
    }
}
