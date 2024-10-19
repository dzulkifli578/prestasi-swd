<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
    protected $table = "prestasi";

    protected $fillable = [
        "nama",
        "juara_id",
        "bidang_lomba_id",
        "nama_lomba",
        "tahun",
        "foto"
    ];
}