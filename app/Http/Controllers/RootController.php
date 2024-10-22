<?php

namespace App\Http\Controllers;

use App\Models\BidangLomba;
use App\Models\Juara;
use App\Models\Prestasi;
use Illuminate\Http\Request;

class RootController extends Controller
{
    public function Beranda(Request $request)
    {
        $prestasi = Prestasi::join("juara", "prestasi.juara_id", "juara.id")
            ->join("bidang_lomba", "prestasi.bidang_lomba_id", "bidang_lomba.id")
            ->select("prestasi.*", "juara.nama as juara", "bidang_lomba.nama as bidang_lomba")
            ->get();

        $jumlahPrestasi = Prestasi::count();
        $jumlahJuara = Juara::count();
        $jumlahBidangLomba = BidangLomba::count();

        return view("beranda.beranda", compact("prestasi", "jumlahPrestasi", "jumlahJuara", "jumlahBidangLomba"));
    }

    public function Prestasi(Request $request)
    {
        $prestasi = Prestasi::join("juara", "prestasi.juara_id", "juara.id")
            ->join("bidang_lomba", "prestasi.bidang_lomba_id", "bidang_lomba.id")
            ->select("prestasi.*", "juara.nama as juara", "bidang_lomba.nama as bidang_lomba")
            ->get();

        $juara = Juara::all();
        $bidangLomba = BidangLomba::all();

        return view("data-prestasi.data-prestasi", compact("prestasi", "juara", "bidangLomba"));
    }

    public function Tentang(Request $request)
    {
        return view("tentang.tentang", compact("prestasi"));
    }

    public function Login(Request $request)
    {
        return view("login");
    }
}
