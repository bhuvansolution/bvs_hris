<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Divisi extends Model
{
    use HasFactory;

    protected $table = 'divisis';
    protected $primaryKey = 'divisi_id';
    protected $fillable = [
        'divisi_nama',
        'divisi_keterangan',
    ];
}
