<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class LogAkun
 *
 * Represents a log of an account in the system.
 *
 * @package App\Models
 *
 * @property int $id
 * @property int $akun_id
 * @property string $judul
 * @property string $isi
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 */
class LogAkun extends Model
{
    protected $table = 'log_akun';

    protected $primaryKey = "id";

    protected $fillable = [
        'akun_id',
        'judul',
        'isi'
    ];

    public $timestamps = true;
}