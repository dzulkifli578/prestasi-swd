<?php

namespace App\Services;

use App\Services\LogAkunService;
use Session;

/**
 * Class LogoutService
 *
 * Service for logging out the user.
 */
class LogoutService
{
    private $logAkunService;

    /**
     * LogoutService constructor.
     *
     * @param LogAkunService $logAkunService
     */
    public function __construct(LogAkunService $logAkunService)
    {
        $this->logAkunService = $logAkunService;
    }

    /**
     * Log out the user.
     * @return mixed|\Illuminate\Http\RedirectResponse
     */
    public function Logout()
    {
        $this->logAkunService->log("Logout", session("nama_pengguna") . " sudah logout");
        Session::flush();
        return redirect()->route("beranda");
    }
}