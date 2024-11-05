<?php

namespace App\Http\Controllers\Peran\AdminManager;

use App\Http\Controllers\Controller;
use App\Models\Akun;
use App\Services\LogAkunService;
use Illuminate\Http\Request;
use Intervention\Image\Drivers\Imagick\Driver;
use Intervention\Image\ImageManager;

/**
 * Class DataAdminController
 * 
 * Controller for handling 'data admin' features.
 * @package App\Http\Controllers\Admin
 */
class DataAdminController extends Controller
{
    private $logAkunService;

    /**
     * DataAdminController constructor.
     *
     * @param \App\Services\LogAkunService $logAkunService
     */
    public function __construct(LogAkunService $logAkunService)
    {
        $this->logAkunService = $logAkunService;
    }

    /**
     * Display list of admin data.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\View
     */
    public function DataAdmin(Request $request)
    {
        $akun = Akun::select("*")->where("peran", "admin")->get();
        return view("peran.admin-manager.data-admin.data-admin", compact("akun"));
    }

    /**
     * TambahDataAdmin function to add admin data.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function TambahDataAdmin(Request $request)
    {
        $validate = $request->validate([
            "nama_pengguna" => "required|string",
            "kata_sandi" => "required|string",
            "email" => "required|string",
            "peran" => "required|string|in:admin",
            "foto" => "nullable|image|mimes:jpeg,jpg,png"
        ]);

        if ($request->hasFile("foto")) {
            $file = $request->file("foto");
            $filename = time() . "_" . $file->getClientOriginalName();
            $file->move(public_path("img/admin-manager"), $filename);
            $validate["foto"] = "img/admin-manager/" . $filename;
        }

        $akun = Akun::create($validate);

        if (!$akun)
            return redirect()->back()->with("error", "Gagal menambah data admin.");

        $this->logAkunService->log('Menambah data admin', session('nama_pengguna') . ' menambah data admin: ' . $validate["nama_pengguna"]);

        return redirect()->back()->with("sukses", "Berhasil menambah data admin.");
    }

    /**
     * EditDataAdmin function to edit admin data.
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function EditDataAdmin(Request $request, int $id)
    {
        $data = [];

        $akun = Akun::find($id);

        if (!$akun)
            return redirect()->back()->with("error", "Data admin tidak ditemukan.");

        if ($request->filled("nama_pengguna"))
            $data["nama_pengguna"] = $request->input("nama_pengguna");

        if ($request->filled("kata_sandi"))
            $data["kata_sandi"] = password_hash($request->input("kata_sandi"), PASSWORD_ARGON2I);

        if ($request->filled("email"))
            $data["email"] = $request->input("email");

        if ($request->filled("peran"))
            $data["peran"] = $request->input("peran");

        if ($request->hasFile("foto")) {
            $file = $request->file("foto");

            $manager = new ImageManager(new Driver());
            $image = $manager->read($file->getRealPath());
            $filename = time() . "_" . pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME) . ".avif";
            $image->toAvif(100);

            $image->save(public_path("img/admin/" . $id . "/" . $filename));

            if ($akun->foto && file_exists(public_path($akun->foto)))
                unlink(public_path($akun->foto));

            $data["foto"] = "img/admin/" . $id . "/" . $filename;
        } else
            $data["foto"] = $akun->foto;

        $akun->update($data);

        if (!$akun)
            return redirect()->back()->with("error", "Gagal mengedit data admin.");

        $this->logAkunService->log('Mengedit data admin', session('nama_pengguna') . ' mengedit data admin: ' . $data["nama_pengguna"]);

        return redirect()->back()->with("sukses", "Berhasil mengedit data admin");
    }

    /**
     * HapusDataAdmin function to delete admin data.
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function HapusDataAdmin(Request $request, int $id)
    {
        $akun = Akun::find($id);

        if (!$akun)
            return redirect()->back()->with("error", "Data admin tidak ditemukan.");

        $akun->delete();

        return redirect()->back()->with("sukses", "Berhasil menghapus data admin.");
    }
}
