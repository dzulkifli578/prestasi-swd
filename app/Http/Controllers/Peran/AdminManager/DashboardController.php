<?php

namespace App\Http\Controllers\Peran\AdminManager;

use App\Http\Controllers\Controller;
use App\Models\Akun;
use App\Services\LoginDataService;
use Illuminate\Http\Request;

/**
 * Class DashboardController
 * 
 * Controller for handling admin-manager dashboard features.
 * @package App\Http\Controllers\Admin
 */
class DashboardController extends Controller
{
    private $loginDataService;

    /**
     * DashboardController constructor.
     * @param \App\Services\LoginDataService $loginDataService
     */
    public function __construct(LoginDataService $loginDataService)
    {
        $this->loginDataService = $loginDataService;
    }

    /**
     * Handle admin-manager dashboard.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\View
     */
    public function Dashboard(Request $request)
    {
        $data = $this->loginDataService->get();
        $akun = Akun::select("*")->where("peran", "admin")->get();
        $jumlahAdmin = Akun::where("peran", "admin")->count();
        return view("peran.admin-manager.dashboard.dashboard", array_merge($data, compact("akun", "jumlahAdmin")));
    }
}
