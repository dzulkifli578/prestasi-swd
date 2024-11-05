<?php

namespace App\Http\Controllers\Peran\Admin;

use App\Http\Controllers\Controller;
use App\Models\Akun;
use App\Services\LogAkunService;
use App\Services\LoginDataService;
use Illuminate\Http\Request;

/**
 * Class ProfilController
 *
 * Controller for handling admin profile-related features.
 *
 * @package App\Http\Controllers\Admin
 */
class ProfilController extends Controller
{
    private $loginDataService, $logAkunService;

    /**
     * ProfilController constructor.
     *
     * @param LogAkunService $logAkunService
     */
    public function __construct(LoginDataService $loginDataService, LogAkunService $logAkunService)
    {
        $this->loginDataService = $loginDataService;
        $this->logAkunService = $logAkunService;
    }

    /**
     * Display admin profile page.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\View
     */
    public function Profil(Request $request)
    {
        $data = $this->loginDataService->get();
        $akun = Akun::find(session()->get("id"))->first();
        return view("peran.components.profil.profil", array_merge($data, compact("akun")));
    }

    /**
     * Handle update admin profile request.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function PerbaruiProfil(Request $request)
    {
        $data = [];

        if ($request->filled("nama_pengguna"))
            $data["nama_pengguna"] = $request->input("nama_pengguna");

        if ($request->filled("kata_sandi"))
            $data["kata_sandi"] = password_hash($request->input("kata_sandi"), PASSWORD_ARGON2I);

        if ($request->filled("email"))
            $data["email"] = $request->input("email");

        $akun = Akun::find(session()->get("id"));

        if (!$akun)
            return redirect()->back()->with("error", "Akun tidak ditemukan.");

        if ($request->hasFile("foto")) {
            $file = $request->file("foto");
            $filename = time() . "_" . $file->getClientOriginalName();
            $file->move(public_path("img/admin/" . session()->get("id")), $filename);

            if ($akun->foto && file_exists(public_path($akun->foto)))
                unlink(public_path($akun->foto));

            $data["foto"] = "img/admin/" . session()->get("id") . "/" . $filename;
        }

        $akun->update($data);

        if (!$akun)
            return redirect()->back()->with("error", "Gagal memperbarui profil.");

        session([
            "nama_pengguna" => $akun->nama_pengguna,
            "foto" => $akun->foto
        ]);

        $this->logAkunService->log('Memperbarui profil', session('nama_pengguna') . ' memperbarui profil');

        return redirect()->back()->with("sukses", "Berhasil memperbarui profil.");
    }
}