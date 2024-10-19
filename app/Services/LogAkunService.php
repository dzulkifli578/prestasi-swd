<?php

namespace App\Services;

use App\Models\LogAkun;

/**
 * Class LogAkunService
 *
 * Service for logging user actions.
 *
 * @package App\Services
 */
class LogAkunService
{
    /**
     * Log user actions.
     *
     * @param string $judul The title of the action.
     * @param string $isi The details of the action.
     * @return void
     */
    public function log($judul, $isi)
    {
        LogAkun::create([
            'akun_id' => session('id'),
            'judul' => $judul,
            'isi' => $isi
        ]);
    }
}