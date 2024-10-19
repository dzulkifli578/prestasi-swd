<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BidangLomba;
use App\Models\Juara;
use App\Models\Prestasi;
use App\Services\LogAkunService;
use Illuminate\Http\Request;

/**
 * Class DataPrestasiController
 *
 * Controller for handling data prestasi-related features.
 *
 * @package App\Http\Controllers\Admin
 */
class DataPrestasiController extends Controller
{
    private $logAkunService;

    /**
     * DataPrestasi constructor.
     *
     * @param LogAkunService $logAkunService
     */
    public function __construct(LogAkunService $logAkunService)
    {
        $this->logAkunService = $logAkunService;
    }

    /**
     * Data Prestasi function to display prestasi data.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\View
     */
    public function DataPrestasi(Request $request)
    {
        $prestasi = Prestasi::join("juara", "prestasi.juara_id", "juara.id")
            ->join("bidang_lomba", "prestasi.bidang_lomba_id", "bidang_lomba.id")
            ->select("prestasi.*", "juara.nama as juara", "bidang_lomba.nama as bidang_lomba")
            ->get();

        $juara = Juara::all();
        $bidangLomba = BidangLomba::all();

        return view("admin.data-prestasi.data-prestasi", compact("prestasi", "juara", "bidangLomba"));
    }

    /**
     * Tambah Data Prestasi function to add new prestasi data.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function TambahDataPrestasi(Request $request)
    {
        $validate = $request->validate([
            "nama" => "required|string",
            "juara_id" => "required|integer",
            "bidang_lomba_id" => "required|integer",
            "nama_lomba" => "required|string",
            "tahun" => "required|integer",
            "foto" => "required|image|mimes:jpeg,jpg,png"
        ]);

        if ($request->hasFile("foto")) {
            $file = $request->file("foto");
            $filename = time() . "_" . $file->getClientOriginalName();
            $file->move(public_path("img/prestasi"), $filename);
            $validate["foto"] = "img/prestasi/" . $filename;
        } else {
            return redirect()->back()->with("error", "Gagal mengunggah gambar.");
        }

        $prestasi = Prestasi::create($validate);

        if (!$prestasi) {
            return redirect()->back()->with("error", "Gagal menambah data prestasi.");
        }

        $this->logAkunService->log('Menambah data prestasi', session('nama_pengguna') . ' menambah data prestasi: ' . $validate["nama"]);

        return redirect()->back()->with("sukses", "Berhasil menambah data prestasi.");
    }

    /**
     * Edit Data Prestasi function to edit existing prestasi data.
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function EditDataPrestasi(Request $request, int $id)
    {
        $validate = $request->validate([
            "nama" => "required|string",
            "juara_id" => "required|integer",
            "bidang_lomba_id" => "required|integer",
            "nama_lomba" => "required|string",
            "tahun" => "required|integer",
            "foto" => "nullable|image|mimes:jpeg,jpg,png"
        ]);

        $prestasi = Prestasi::find($id);

        if (!$prestasi) {
            return redirect()->back()->with("error", "Data prestasi tidak ditemukan.");
        }

        if ($request->hasFile("foto")) {
            $file = $request->file("foto");
            $filename = time() . "_" . $file->getClientOriginalName();
            $file->move(public_path("img/prestasi"), $filename);

            if ($prestasi->foto && file_exists(public_path($prestasi->foto))) {
                unlink(public_path($prestasi->foto));
            }

            $validate["foto"] = "img/prestasi/" . $filename;
        }

        $prestasi->update($validate);

        if (!$prestasi) {
            return redirect()->back()->with("error", "Gagal mengedit data prestasi.");
        }

        $this->logAkunService->log('Mengedit data prestasi', session('nama_pengguna') . ' mengedit data prestasi: ' . $validate["nama"]);

        return redirect()->back()->with("sukses", "Berhasil mengedit data prestasi");
    }

    /**
     * Hapus Data Prestasi function to delete prestasi data.
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function HapusDataPrestasi(Request $request, int $id)
    {
        $prestasi = Prestasi::find($id);

        if (!$prestasi) {
            return redirect()->back()->with("error", "Data prestasi tidak ditemukan.");
        }

        if ($prestasi->foto && file_exists(public_path($prestasi->foto))) {
            unlink(public_path($prestasi->foto));
        }

        $prestasi->delete();

        $this->logAkunService->log('Menghapus data prestasi', session('nama_pengguna') . ' menghapus data prestasi dengan id: ' . $id);

        return redirect()->back()->with("sukses", "Berhasil menghapus data prestasi.");
    }
}