<?php

namespace App\Http\Controllers\Peran\AdminManager;

use App\Http\Controllers\Controller;
use App\Models\LogAkun;
use App\Services\LogAkunService;
use Illuminate\Http\Request;
use Session;

class LogAkunController extends Controller
{
    private $logAkunService;

    /**
     * LogAkunController constructor.
     *
     * @param \App\Services\LogAkunService $logAkunService
     */
    public function __construct(LogAkunService $logAkunService)
    {
        $this->logAkunService = $logAkunService;
    }

    /**
     * Display list of the 'log akun'.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function LogAkun(Request $request)
    {
        $log = LogAkun::select("*")->where("akun_id", Session::get("id"))->get();
        return view("peran.components.log.log", compact("log"));
    }

    /**
     * Delete all logs.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function HapusLog(Request $request)
    {
        return $this->logAkunService->hapusLog(session()->get("id"));
    }
}
