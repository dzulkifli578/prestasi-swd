<?php

namespace App\Http\Controllers\Peran\AdminManager;

use App\Http\Controllers\Controller;
use App\Models\LogAkun;
use App\Services\LogAkunService;
use App\Services\LoginDataService;
use Illuminate\Http\Request;
use Session;

class LogAkunController extends Controller
{
    private $loginDataService, $logAkunService;

    public function __construct(LoginDataService $loginDataService, LogAkunService $logAkunService)
    {
        $this->loginDataService = $loginDataService;
        $this->logAkunService = $logAkunService;
    }

    public function LogAkun(Request $request)
    {
        $data = $this->loginDataService->get();
        $log = LogAkun::select("*")->where("akun_id", Session::get("id"))->get();
        return view("peran.components.log.log", array_merge($data, compact("log")));
    }

    public function HapusLog(Request $request)
    {
        return $this->logAkunService->hapusLog(session()->get("id"));
    }
}
