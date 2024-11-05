<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
    protected $table = "prestasi";

    protected $primaryKey = "id";

    public $timestamps = true;

    protected $fillable = [
        "nama",
        "juara_id",
        "bidang_lomba_id",
        "nama_lomba",
        "tahun",
        "foto"
    ];

    public function juara()
    {
        return $this->belongsTo(Juara::class, "juara_id");
    }

    public function bidangLomba()
    {
        return $this->belongsTo(BidangLomba::class, "bidang_lomba_id");
    }
}