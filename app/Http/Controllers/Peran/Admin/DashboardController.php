<?php

namespace App\Http\Controllers\Peran\Admin;

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
        $prestasi = Prestasi::with("juara", "bidangLomba")
            ->select("prestasi.*", "tahun")
            ->orderByDesc("id")
            ->paginate(6);

        $jumlahPrestasi = Prestasi::count();
        $jumlahJuara = Juara::count();
        $jumlahBidangLomba = BidangLomba::count();

        $prestasiPerTahun = Prestasi::selectRaw("tahun, COUNT(tahun) as jumlah")
            ->groupBy("tahun")
            ->get();

        $juaraTerbanyak = Prestasi::with("juara")
            ->selectRaw("juara_id, COUNT(juara_id) as jumlah")
            ->groupBy("juara_id")
            ->orderByDesc("jumlah")
            ->limit(3)
            ->get()
            ->map(function ($prestasi) {
                return [
                    "juara" => $prestasi->juara->nama,
                    "jumlah" => $prestasi->jumlah
                ];
            });

        $bidangLombaTerbanyak = Prestasi::with("bidangLomba")
            ->selectRaw("bidang_lomba_id, COUNT(bidang_lomba_id) as jumlah")
            ->groupBy("bidang_lomba_id")
            ->orderByDesc("jumlah")
            ->limit(3)
            ->get()
            ->map(function ($prestasi) {
                return [
                    "bidang_lomba" => $prestasi->bidangLomba->nama,
                    "jumlah" => $prestasi->jumlah
                ];
            });

        $lokasiLombaTerbanyak = Prestasi::selectRaw("nama_lomba, COUNT(nama_lomba) as jumlah")
            ->groupBy("nama_lomba")
            ->orderByDesc("jumlah")
            ->limit(3)
            ->get()
            ->toArray();

        $pesertaLombaTerbanyak = Prestasi::selectRaw("nama, COUNT(nama) as jumlah")
            ->groupBy("nama")
            ->orderByDesc("jumlah")
            ->limit(3)
            ->get()
            ->toArray();

        return view(
            "peran.admin.dashboard.dashboard",
            compact(
                "prestasi",
                "jumlahPrestasi",
                "jumlahJuara",
                "jumlahBidangLomba",
                "prestasiPerTahun",
                "juaraTerbanyak",
                "bidangLombaTerbanyak",
                "lokasiLombaTerbanyak",
                "pesertaLombaTerbanyak"
            )
        );
    }
}