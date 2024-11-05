<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Akun
 *
 * Represents a user account in the system.
 *
 * @package App\Models
 *
 * @property int $id
 * @property string $nama_pengguna
 * @property string $kata_sandi
 * @property string $email
 * @property string|null $foto
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 */
class Akun extends Model
{
    protected $table = "akun";

    protected $primaryKey = "id";

    protected $fillable = [
        "nama_pengguna",
        "kata_sandi",
        "email",
        "peran",
        "foto"
    ];

    public $timestamps = true;

    public function logAkun()
    {
        return $this->hasMany(LogAkun::class);
    }
}