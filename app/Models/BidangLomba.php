<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class BidangLomba
 *
 * Represents a competition field in the system.
 *
 * @package App\Models
 *
 * @property int $id
 * @property string $nama
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 */
class BidangLomba extends Model
{
    protected $table = "bidang_lomba";

    protected $primaryKey = "id";

    protected $fillable = [
        "nama"
    ];

    public $timestamps = true;

    public function prestasi()
    {
        return $this->belongsTo(Prestasi::class);
    }
}