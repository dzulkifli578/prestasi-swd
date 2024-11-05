<?php

namespace App\Http\Controllers;

use App\Models\BidangLomba;
use App\Models\Juara;
use App\Models\Prestasi;
use Illuminate\Http\Request;

/**
 * Class DashboardController
 *
 * Controller for handling root features.
 *
 * @package App\Http\Controllers\Admin
 */
class RootController extends Controller
{
    /**
     * Display the root dashboard.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\View
     */
    public function Beranda(Request $request)
    {
        $prestasi = Prestasi::with("juara", "bidangLomba")
            ->select("prestasi.*", "tahun")
            ->orderByDesc("id")
            ->paginate(6);

        $jumlahPrestasi = Prestasi::count();
        $jumlahJuara = Juara::count();
        $jumlahBidangLomba = BidangLomba::count();
        $juara = Juara::all();
        $bidangLomba = BidangLomba::all();

        return view("beranda.beranda", compact("prestasi", "jumlahPrestasi", "jumlahJuara", "jumlahBidangLomba", "juara", "bidangLomba"));
    }

    /**
     * Display the 'prestasi' data
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function Prestasi(Request $request)
    {
        $prestasi = Prestasi::with("juara", "bidangLomba")
            ->select("prestasi.*", "tahun")
            ->orderByDesc("id")
            ->get();

        $juara = Juara::all();
        $bidangLomba = BidangLomba::all();

        return view("data-prestasi.data-prestasi", compact("prestasi", "juara", "bidangLomba"));
    }

    /**
     * Display 'tentang' page
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function Tentang(Request $request)
    {
        return view("tentang.tentang");
    }

    /**
     * Display 'login' page
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function Login(Request $request)
    {
        return view("login");
    }
}
