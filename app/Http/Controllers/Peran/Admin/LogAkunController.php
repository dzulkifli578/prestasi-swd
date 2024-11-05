<?php

namespace App\Http\Controllers\Peran\Admin;
use App\Http\Controllers\Controller;
use App\Models\LogAkun;
use App\Services\LogAkunService;
use App\Services\LoginDataService;
use Illuminate\Http\Request;
use Session;

/**
 * Class LogAkunController
 *
 * Controller for handling log akun-related features.
 *
 * @package App\Http\Controllers\Admin
 */
class LogAkunController extends Controller
{
    private $loginDataService, $logAkunService;

    public function __construct(LoginDataService $loginDataService, LogAkunService $logAkunService)
    {
        $this->loginDataService = $loginDataService;
        $this->logAkunService = $logAkunService;
    }

    /**
     * Display list of the 'log akun'.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\View
     */
    public function LogAkun(Request $request)
    {
        $data = $this->loginDataService->get();
        $log = LogAkun::select("*")->where("akun_id", Session::get("id"))->get();
        return view("peran.components.log.log", array_merge($data, compact("log")));
    }

    /**
     * Delete all 'log akun'.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function HapusLog(Request $request)
    {
        return $this->logAkunService->hapusLog(session()->get("id"));
    }
}