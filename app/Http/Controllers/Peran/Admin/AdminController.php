<?php

namespace App\Http\Controllers\Peran\Admin;

use App\Http\Controllers\Controller;
use App\Services\LogoutService;
use Illuminate\Http\Request;

/**
 * Class AdminController
 *
 * Controller for handling admin-related features.
 */
class AdminController extends Controller
{
    private $dashboardController, $profilController, $dataPrestasiController, $logAkunController, $juaraBidangLombaController, $logoutService;

    /**
     * AdminController constructor.
     *
     * @param DashboardController $dashboardController
     * @param ProfilController $profilController
     * @param DataPrestasiController $dataPrestasiController
     * @param LogAkunController $logAkunController
     * @param JuaraBidangLombaController $juaraBidangLombaController
     * @param LogoutService $logoutService
     */
    public function __construct(
        DashboardController $dashboardController,
        ProfilController $profilController,
        DataPrestasiController $dataPrestasiController,
        LogAkunController $logAkunController,
        JuaraBidangLombaController $juaraBidangLombaController,
        LogoutService $logoutService
    ) {
        $this->dashboardController = $dashboardController;
        $this->profilController = $profilController;
        $this->dataPrestasiController = $dataPrestasiController;
        $this->logAkunController = $logAkunController;
        $this->juaraBidangLombaController = $juaraBidangLombaController;
        $this->logoutService = $logoutService;
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
     * @return \Illuminate\Contracts\View\View
     */
    public function Profil(Request $request)
    {
        return $this->profilController->Profil($request);
    }

    /**
     * Handle update admin profile.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function PerbaruiProfil(Request $request)
    {
        return $this->profilController->PerbaruiProfil($request);
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
     * Handle admin log.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\View
     */
    public function Log(Request $request)
    {
        return $this->logAkunController->LogAkun($request);
    }

    public function HapusLog(Request $request)
    {
        return $this->logAkunController->HapusLog($request);
    }

    /**
     * Handle logout.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function Logout(Request $request)
    {
        return $this->logoutService->Logout();
    }
}