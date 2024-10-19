<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\DataPrestasiController;
use App\Http\Controllers\Admin\JuaraBidangLombaController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LogAkunController;
use App\Services\LogAkunService;
use Illuminate\Http\Request;
use Session;

/**
 * Class AdminController
 *
 * Controller for handling admin-related features.
 *
 * @package App\Http\Controllers\Admin
 */
class AdminController extends Controller
{
    private $dashboardController, $profilController, $dataPrestasiController, $logAkunController, $juaraBidangLombaController, $logAkunService;

    /**
     * AdminController constructor.
     *
     * @param DashboardController $dashboardController
     * @param ProfilController $profilController
     * @param DataPrestasiController $dataPrestasiController
     * @param LogAkunController $logAkunController
     * @param JuaraBidangLombaController $juaraBidangLombaController
     * @param LogAkunService $logAkunService
     */
    public function __construct(
        DashboardController $dashboardController,
        ProfilController $profilController,
        DataPrestasiController $dataPrestasiController,
        LogAkunController $logAkunController,
        JuaraBidangLombaController $juaraBidangLombaController,
        LogAkunService $logAkunService
    ) {
        $this->dashboardController = $dashboardController;
        $this->profilController = $profilController;
        $this->dataPrestasiController = $dataPrestasiController;
        $this->logAkunController = $logAkunController;
        $this->juaraBidangLombaController = $juaraBidangLombaController;
        $this->logAkunService = $logAkunService;
    }

    /**
     * Handle admin dashboard.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\View
     */
    public function Dashboard(Request $request)
    {
        return $this->dashboardController->Dashboard($request);
    }

    /**
     * Handle admin profile.
     *
     * @param Request $request
     * @param Session $session
     * @return \Illuminate\Contracts\View\View
     */
    public function Profil(Request $request, Session $session)
    {
        return $this->profilController->Profil($request, $session);
    }

    /**
     * Handle update admin profile.
     *
     * @param Request $request
     * @param Session $session
     * @return \Illuminate\Http\RedirectResponse
     */
    public function PerbaruiProfil(Request $request, Session $session)
    {
        return $this->profilController->PerbaruiProfil($request, $session);
    }

    /**
     * Handle data prestasi.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\View
     */
    public function DataPrestasi(Request $request)
    {
        return $this->dataPrestasiController->DataPrestasi($request);
    }

    /**
     * Handle add data prestasi.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function TambahDataPrestasi(Request $request)
    {
        return $this->dataPrestasiController->TambahDataPrestasi($request);
    }

    /**
     * Handle edit data prestasi.
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function EditDataPrestasi(Request $request, int $id)
    {
        return $this->dataPrestasiController->EditDataPrestasi($request, $id);
    }

    /**
     * Handle delete data prestasi.
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function HapusDataPrestasi(Request $request, int $id)
    {
        return $this->dataPrestasiController->HapusDataPrestasi($request, $id);
    }

    /**
     * Handle admin log.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\View
     */
    public function Log(Request $request)
    {
        return $this->logAkunController->LogAkun($request);
    }

    /**
     * Handle juara bidang lomba.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\View
     */
    public function JuaraBidangLomba(Request $request)
    {
        return $this->juaraBidangLombaController->JuaraBidangLomba($request);
    }

    /**
     * Handle add juara.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function TambahJuara(Request $request)
    {
        return $this->juaraBidangLombaController->TambahJuara($request);
    }

    /**
     * Handle add bidang lomba.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function TambahBidangLomba(Request $request)
    {
        return $this->juaraBidangLombaController->TambahBidangLomba($request);
    }

    /**
     * Handle edit juara.
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function EditJuara(Request $request, int $id)
    {
        return $this->juaraBidangLombaController->EditJuara($request, $id);
    }

    /**
     * Handle delete juara.
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function HapusJuara(Request $request, int $id)
    {
        return $this->juaraBidangLombaController->HapusJuara($request, $id);
    }

    /**
     * Handle edit bidang lomba.
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function EditBidangLomba(Request $request, int $id)
    {
        return $this->juaraBidangLombaController->EditBidangLomba($request, $id);
    }

    /**
     * Handle delete bidang lomba.
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function HapusBidangLomba(Request $request, int $id)
    {
        return $this->juaraBidangLombaController->HapusBidangLomba($request, $id);
    }

    /**
     * Handle logout.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function Logout(Request $request)
    {
        $this->logAkunService->log("Logout", session("nama_pengguna") . " sudah logout");
        Session::flush();
        return redirect()->route("beranda");
    }
}