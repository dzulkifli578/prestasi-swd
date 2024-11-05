<?php

namespace App\Http\Controllers\Peran\AdminManager;

use App\Http\Controllers\Controller;
use App\Models\Akun;
use Illuminate\Http\Request;

/**
 * Class DashboardController
 * 
 * Controller for handling admin-manager dashboard features.
 * @package App\Http\Controllers\Admin
 */
class DashboardController extends Controller
{
    /**
     * Handle admin-manager dashboard.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\View
     */
    public function Dashboard(Request $request)
    {
        $akun = Akun::select("*")->where("peran", "admin")->get();
        $jumlahAdmin = Akun::where("peran", "admin")->count();
        return view("peran.admin-manager.dashboard.dashboard", compact("akun", "jumlahAdmin"));
    }
}
