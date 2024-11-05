<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Juara
 *
 * Represents a champion in the competition system.
 *
 * @package App\Models
 *
 * @property int $id
 * @property string $nama
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 */
class Juara extends Model
{
    protected $table = "juara";

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