<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\LogAkun;
use Illuminate\Http\Request;

/**
 * Class LogAkunController
 *
 * Controller for handling log akun-related features.
 *
 * @package App\Http\Controllers\Admin
 */
class LogAkunController extends Controller
{
    /**
     * Display a listing of the log akun.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\View
     */
    public function LogAkun(Request $request)
    {
        $log = LogAkun::all();
        return view("admin.log.log", compact("log"));
    }
}