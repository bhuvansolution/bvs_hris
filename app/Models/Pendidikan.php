<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendidikan extends Model
{
    use HasFactory;

    protected $table = 'pendidikans';

    protected $primaryKey = 'pendidikan_id';

    protected $fillable = [
        'pendidikan_nama',
        'pendidikan_keterangan',
    ];
}
