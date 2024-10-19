<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\BidangLomba;
use App\Models\Juara;
use App\Services\LogAkunService;
use Illuminate\Http\Request;

/**
 * Class JuaraBidangLombaController
 *
 * Controller for handling juara bidang lomba-related features.
 *
 * @package App\Http\Controllers\Admin
 */
class JuaraBidangLombaController extends Controller
{
    private $logAkunService;

    /**
     * JuaraBidangLombaController constructor.
     *
     * @param LogAkunService $logAkunService
     */
    public function __construct(LogAkunService $logAkunService)
    {
        $this->logAkunService = $logAkunService;
    }

    /**
     * Handle juara bidang lomba page.
     * 
     * @param Request $request
     * 
     * @return \Illuminate\Contracts\View\View
     */
    public function JuaraBidangLomba(Request $request)
    {
        $juara = Juara::all();
        $bidangLomba = BidangLomba::all();

        return view("admin.juara-bidang-lomba.juara-bidang-lomba", compact("juara", "bidangLomba"));
    }

    /**
     * Handle add juara request.
     * 
     * @param Request $request
     * 
     * @return \Illuminate\Http\RedirectResponse
     */
    public function TambahJuara(Request $request)
    {
        $validate = $request->validate([
            "nama" => "required"
        ]);

        $juara = Juara::create($validate);

        if (!$juara)
            return redirect()->back()->with("error_juara", "Gagal menambahkan juara.");

        $this->logAkunService->log('Menambah Juara', session('nama_pengguna') . ' menambahkan juara: ' . $validate["nama"]);

        return redirect()->back()->with("sukses_juara", "Berhasil menambahkan juara.");
    }

    /**
     * Handle edit juara request.
     * 
     * @param Request $request
     * @param int $id
     * 
     * @return \Illuminate\Http\RedirectResponse
     */
    public function EditJuara(Request $request, int $id)
    {
        $validate = $request->validate([
            "nama" => "required"
        ]);

        $juara = Juara::find($id)->update($validate);

        if (!$juara)
            return redirect()->back()->with("error_juara", "Gagal mengedit juara.");

        $this->logAkunService->log('Mengedit Juara', session('nama_pengguna') . ' mengedit juara: ' . $validate["nama"]);

        return redirect()->back()->with("sukses_juara", "Berhasil mengedit juara.");
    }

    /**
     * Handle delete juara request.
     * 
     * @param Request $request
     * @param int $id
     * 
     * @return \Illuminate\Http\RedirectResponse
     */
    public function HapusJuara(Request $request, int $id)
    {
        $juara = Juara::find($id)->delete();

        if (!$juara)
            return redirect()->back()->with("error_juara", "Gagal menghapus juara.");

        $this->logAkunService->log('Menghapus Juara', session('nama_pengguna') . ' menghapus juara dengan id: ' . $id);

        return redirect()->back()->with("sukses_juara", "Berhasil menghapus juara.");
    }

    /**
     * Handle add bidang lomba request.
     * 
     * @param Request $request
     * 
     * @return \Illuminate\Http\RedirectResponse
     */
    public function TambahBidangLomba(Request $request)
    {
        $validate = $request->validate([
            "nama" => "required"
        ]);

        $bidangLomba = BidangLomba::insert($validate);

        if (!$bidangLomba)
            return redirect()->back()->with("error_bidang_lomba", "Gagal menambahkan bidang lomba.");

        $this->logAkunService->log('Menambah bidang lomba', session('nama_pengguna') . ' menambahkan bidang lomba: ' . $validate["nama"]);

        return redirect()->back()->with("sukses_bidang_lomba", "Berhasil menambahkan bidang lomba.");
    }

    /**
     * Handle edit bidang lomba request.
     * 
     * @param Request $request
     * @param int $id
     * 
     * @return \Illuminate\Http\RedirectResponse
     */
    public function EditBidangLomba(Request $request, int $id)
    {
        $validate = $request->validate([
            "nama" => "required"
        ]);

        $bidangLomba = BidangLomba::find($id)->update($validate);

        if (!$bidangLomba)
            return redirect()->back()->with("error_bidang_lomba", "Gagal mengedit bidang lomba.");

        $this->logAkunService->log('Mengedit bidang lomba', session('nama_pengguna') . ' mengedit bidang lomba: ' . $validate["nama"]);

        return redirect()->back()->with("sukses_bidang_lomba", "Berhasil mengedit bidang lomba.");
    }

    /**
     * Handle delete bidang lomba request.
     * 
     * @param Request $request
     * @param int $id
     * 
     * @return \Illuminate\Http\RedirectResponse
     */
    public function HapusBidangLomba(Request $request, int $id)
    {
        $bidangLomba = BidangLomba::find($id)->delete();

        if (!$bidangLomba)
            return redirect()->back()->with("error_bidang_lomba", "Gagal menghapus bidang lomba.");

        $this->logAkunService->log('Menghapus bidang lomba', session('nama_pengguna') . ' menghapus juara dengan id: ' . $id);

        return redirect()->back()->with("sukses_bidang_lomba", "Berhasil menghapus bidang lomba.");
    }
}