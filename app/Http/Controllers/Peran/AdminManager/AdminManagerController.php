<?php

namespace App\Http\Controllers\Peran\AdminManager;

use App\Http\Controllers\Controller;
use App\Services\LogoutService;
use Illuminate\Http\Request;

class AdminManagerController extends Controller
{
    private $dashboardController, $profilController, $dataAdminController, $logAkunController, $logoutService;

    public function __construct(
        DashboardController $dashboardController,
        ProfilController $profilController,
        DataAdminController $dataAdminController,
        LogAkunController $logAkunController,
        LogoutService $logoutService,
    ) {
        $this->dashboardController = $dashboardController;
        $this->profilController = $profilController;
        $this->dataAdminController = $dataAdminController;
        $this->logAkunController = $logAkunController;
        $this->logoutService = $logoutService;
    }

    public function Dashboard(Request $request)
    {
        return $this->dashboardController->Dashboard($request);
    }

    public function Profil(Request $request)
    {
        return $this->profilController->Profil($request);
    }

    public function PerbaruiProfil(Request $request)
    {
        return $this->profilController->PerbaruiProfil($request);
    }

    public function DataAdmin(Request $request)
    {
        return $this->dataAdminController->DataAdmin($request);
    }

    public function TambahDataAdmin(Request $request)
    {
        return $this->dataAdminController->TambahDataAdmin($request);
    }

    public function EditDataAdmin(Request $request, int $id)
    {
        return $this->dataAdminController->EditDataAdmin($request, $id);
    }

    public function HapusDataAdmin(Request $request, int $id)
    {
        return $this->dataAdminController->HapusDataAdmin($request, $id);
    }

    public function Log(Request $request)
    {
        return $this->logAkunController->LogAkun($request);
    }

    public function HapusLog(Request $request)
    {
        return $this->logAkunController->HapusLog($request);
    }

    public function Logout(Request $request)
    {
        return $this->logoutService->Logout();
    }
}
