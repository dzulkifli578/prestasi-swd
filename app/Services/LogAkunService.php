<?php

namespace App\Services;

use App\Models\LogAkun;
use DB;

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
            'akun_id' => session()->get('id'),
            'judul' => $judul,
            'isi' => $isi
        ]);
    }

    public function hapusLog(int $id)
    {
        LogAkun::where("akun_id", $id)->delete();
        DB::statement("ALTER TABLE log_akun AUTO_INCREMENT = 1");
        return redirect()->back()->with("sukses", "Log akun telah dihapus");
    }
}