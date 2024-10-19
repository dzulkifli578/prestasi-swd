<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BidangLomba;
use App\Models\Juara;
use App\Models\Prestasi;
use Illuminate\Http\Request;

/**
 * Class DashboardController
 *
 * Controller for handling admin dashboard-related features.
 *
 * @package App\Http\Controllers\Admin
 */
class DashboardController extends Controller
{
    /**
     * Display the admin dashboard.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\View
     */
    public function Dashboard(Request $request)
    {
        $prestasi = Prestasi::join("juara", "prestasi.juara_id", "juara.id")
            ->join("bidang_lomba", "prestasi.bidang_lomba_id", "bidang_lomba.id")
            ->select("prestasi.*", "juara.nama as juara", "bidang_lomba.nama as bidang_lomba")
            ->get();

        $jumlahPrestasi = Prestasi::count();
        $jumlahJuara = Juara::count();
        $jumlahBidangLomba = BidangLomba::count();

        return view("admin.dashboard.dashboard", compact("prestasi", "jumlahPrestasi", "jumlahJuara", "jumlahBidangLomba"));
    }
}