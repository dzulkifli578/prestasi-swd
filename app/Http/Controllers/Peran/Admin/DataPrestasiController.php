<?php

namespace App\Http\Controllers\Peran\Admin;

use App\Http\Controllers\Controller;
use App\Models\BidangLomba;
use App\Models\Juara;
use App\Models\Prestasi;
use App\Services\LogAkunService;
use Illuminate\Http\Request;
use \Intervention\Image\Drivers\Imagick\Driver;
use Intervention\Image\ImageManager;

/**
 * Class DataPrestasiController
 *
 * Controller for handling 'data prestasi' features.
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
     * DataPrestasi function to display 'prestasi' data.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\View
     */
    public function DataPrestasi(Request $request)
    {
        $prestasi = Prestasi::with("juara", "bidangLomba")
            ->select("prestasi.*")
            ->orderBy("prestasi.id")
            ->get();

        $juara = Juara::all();
        $bidangLomba = BidangLomba::select("*")->orderBy("nama", "asc")->get();

        return view("peran.admin.data-prestasi.data-prestasi", compact("prestasi", "juara", "bidangLomba"));
    }

    /**
     * TambahDataPrestasi function to add new 'prestasi' data.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function TambahDataPrestasi(Request $request)
    {
        $validate = $request->validate([
            "nama" => "required|string",
            "juara_id" => "required|integer|exists:juara,id",
            "bidang_lomba_id" => "required|integer|exists:bidang_lomba,id",
            "nama_lomba" => "required|string",
            "tahun" => "required|integer|between:2000," . date('Y'),
            "foto" => "nullable|image|mimes:jpeg,jpg,png"
        ]);

        if ($request->hasFile("foto")) {
            $file = $request->file("foto");

            $manager = new ImageManager(new Driver());
            $image = $manager->read($file->getRealPath());
            $filename = time() . "_" . pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME) . ".avif";
            $image->toAvif(100);

            $image->save(public_path("img/prestasi/" . $filename));
            $validate["foto"] = "img/prestasi/" . $filename;
        }

        $prestasi = Prestasi::create($validate);

        if (!$prestasi)
            return redirect()->back()->with("error", "Gagal menambah data prestasi.");

        $this->logAkunService->log('Menambah data prestasi', session('nama_pengguna') . ' menambah data prestasi: ' . $validate["nama"]);

        return redirect()->back()->with("sukses", "Berhasil menambah data prestasi.");
    }

    /**
     * EditDataPrestasi function to edit existing 'prestasi' data.
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function EditDataPrestasi(Request $request, int $id)
    {
        $validate = $request->validate([
            "nama" => "required|string",
            "juara_id" => "required|integer|exists:juara,id",
            "bidang_lomba_id" => "required|integer|exists:bidang_lomba,id",
            "nama_lomba" => "required|string",
            "tahun" => "required|integer|between:2000," . date('Y'),
            "foto" => "nullable|image|mimetypes:image/jpeg,image/png,image/avif"
        ]);

        $prestasi = Prestasi::find($id);

        if (!$prestasi)
            return redirect()->back()->with("error", "Data prestasi tidak ditemukan.");

        if ($request->hasFile("foto")) {
            $file = $request->file("foto");

            $manager = new ImageManager(new Driver());
            $image = $manager->read($file->getRealPath());
            $filename = time() . "_" . pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME) . ".avif";
            $image->toAvif(100);

            $image->save(public_path("img/prestasi/" . $filename));

            if ($prestasi->foto && file_exists(public_path($prestasi->foto)))
                unlink(public_path($prestasi->foto));

            $validate["foto"] = "img/prestasi/" . $filename;
        } else
            $validate["foto"] = $prestasi->foto;

        $prestasi->update($validate);

        if (!$prestasi)
            return redirect()->back()->with("error", "Gagal mengedit data prestasi.");

        $this->logAkunService->log('Mengedit data prestasi', session('nama_pengguna') . ' mengedit data prestasi: ' . $validate["nama"]);

        return redirect()->back()->with("sukses", "Berhasil mengedit data prestasi");
    }

    /**
     * HapusData Prestasifunction to delete 'prestasi' data.
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function HapusDataPrestasi(Request $request, int $id)
    {
        $prestasi = Prestasi::find($id);

        if (!$prestasi)
            return redirect()->back()->with("error", "Data prestasi tidak ditemukan.");

        if ($prestasi->foto && file_exists(public_path($prestasi->foto)))
            unlink(public_path($prestasi->foto));

        $prestasi->delete();

        $this->logAkunService->log('Menghapus data prestasi', session('nama_pengguna') . ' menghapus data prestasi dengan id: ' . $id);

        return redirect()->back()->with("sukses", "Berhasil menghapus data prestasi.");
    }
}