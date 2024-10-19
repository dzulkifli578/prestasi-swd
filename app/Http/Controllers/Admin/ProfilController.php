<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Akun;
use App\Services\LogAkunService;
use Illuminate\Http\Request;
use Session;

/**
 * Class ProfilController
 *
 * Controller for handling admin profile-related features.
 *
 * @package App\Http\Controllers\Admin
 */
class ProfilController extends Controller
{
    private $logAkunService;

    /**
     * ProfilController constructor.
     *
     * @param LogAkunService $logAkunService
     */
    public function __construct(LogAkunService $logAkunService)
    {
        $this->logAkunService = $logAkunService;
    }

    /**
     * Display admin profile page.
     *
     * @param Request $request
     * @param Session $session
     * @return \Illuminate\Contracts\View\View
     */
    public function Profil(Request $request, Session $session)
    {
        $akun = Akun::find($session::get("id"))->first();
        return view("admin.profil.profil", compact("akun"));
    }

    /**
     * Handle update admin profile request.
     *
     * @param Request $request
     * @param Session $session
     * @return \Illuminate\Http\RedirectResponse
     */
    public function PerbaruiProfil(Request $request, Session $session)
    {
        $data = [];

        if ($request->filled("nama_pengguna"))
            $data["nama_pengguna"] = $request->input("nama_pengguna");

        if ($request->filled("kata_sandi"))
            $data["kata_sandi"] = password_hash($request->input("kata_sandi"), PASSWORD_ARGON2I);

        if ($request->filled("email"))
            $data["email"] = $request->input("email");

        if (empty($data))
            return redirect()->back()->with("error", "Tidak ada data yang diperbarui.");

        $akun = Akun::find($session::get("id"));

        if (!$akun)
            return redirect()->back()->with("error", "Akun tidak ditemukan.");

        if ($request->hasFile("foto")) {
            $file = $request->file("foto");
            $filename = time() . "_" . $file->getClientOriginalName();
            $file->move(public_path("img/profil"), $filename);

            if ($akun->foto && file_exists(public_path($akun->foto)))
                unlink(public_path($akun->foto));

            $data["foto"] = "img/profil/" . $filename;
        }

        $akun->update($data);

        if (!$akun)
            return redirect()->back()->with("error", "Gagal memperbarui profil.");

        $this->logAkunService->log('Memperbarui profil', session('nama_pengguna') . ' memperbarui profil');

        return redirect()->back()->with("sukses", "Berhasil memperbarui profil.");
    }
}