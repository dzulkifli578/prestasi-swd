<?php

use App\Http\Controllers\Peran\Admin\AdminController;
use App\Http\Controllers\Peran\AdminManager\AdminManagerController;
use App\Http\Controllers\RootController;
use App\Http\Middleware\AdminManagerMiddleware;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\AuthMiddleware;
use App\Http\Middleware\GuestMiddleware;
use Illuminate\Support\Facades\Route;

Route::prefix("/")->group(function () {
    Route::get("", [RootController::class, "Beranda"])->name("beranda");
    Route::get("data-prestasi", [RootController::class, "Prestasi"])->name("prestasi");
    Route::get("tentang", [RootController::class, "Tentang"])->name("tentang");
});

Route::prefix("/login")->middleware(GuestMiddleware::class)->group(function () {
    Route::get("", [RootController::class, "Login"])->name("login");
    Route::post("/proses")->middleware(AuthMiddleware::class)->name("proses-login");
});

Route::prefix("/admin")->middleware(AdminMiddleware::class)->group(function () {
    Route::get("/dashboard", [AdminController::class, "Dashboard"])->name("dashboard-admin");
    Route::get("/profil", [AdminController::class, "Profil"])->name("profil-admin");
    Route::put("/profil/perbarui", [AdminController::class, "PerbaruiProfil"])->name("perbarui-profil-admin");

    Route::prefix("/data-prestasi")->group(function () {
        Route::get("/", [AdminController::class, "DataPrestasi"])->name("data-prestasi");
        Route::post("/tambah", [AdminController::class, "TambahDataPrestasi"])->name("tambah-data-prestasi");
        Route::put("/edit/{id}", [AdminController::class, "EditDataPrestasi"])->name("edit-data-prestasi");
        Route::delete("/hapus/{id}", [AdminController::class, "HapusDataPrestasi"])->name("hapus-data-prestasi");
    });

    Route::prefix("/juara-bidang-lomba")->group(function () {
        Route::get("/", [AdminController::class, "JuaraBidangLomba"])->name("juara-bidang-lomba");
        Route::post("/tambah-juara", [AdminController::class, "TambahJuara"])->name("tambah-juara");
        Route::put("/edit-juara/{id}", [AdminController::class, "EditJuara"])->name("edit-juara");
        Route::delete("/hapus-juara/{id}", [AdminController::class, "HapusJuara"])->name("hapus-juara");
        
        Route::post("/tambah-bidang-lomba", [AdminController::class, "TambahBidangLomba"])->name("tambah-bidang-lomba");
        Route::put("/edit-bidang-lomba/{id}", [AdminController::class, "EditBidangLomba"])->name("edit-bidang-lomba");
        Route::delete("/hapus-bidang-lomba/{id}", [AdminController::class, "HapusBidangLomba"])->name("hapus-bidang-lomba");
    });

    Route::prefix("/log")->group(function () {
        Route::get("", [AdminController::class, "Log"])->name("log-admin");
        Route::delete("/hapus/{id}", [AdminController::class, "HapusLog"])->name("hapus-log-admin");
    });

    Route::post("/logout", [AdminController::class, "Logout"])->name("logout-admin");
});

Route::prefix("/admin-manager")->middleware(AdminManagerMiddleware::class)->group(function () {
    Route::get("/dashboard", [AdminManagerController::class, "Dashboard"])->name("dashboard-admin-manager");
    Route::get("/profil", [AdminManagerController::class, "Profil"])->name("profil-admin-manager");
    Route::put("/profil/perbarui", [AdminManagerController::class, "PerbaruiProfil"])->name("perbarui-profil-admin-manager");

    Route::get("/data-admin", [AdminManagerController::class, "DataAdmin"])->name("data-admin");
    Route::post("/data-admin/tambah", [AdminManagerController::class, "TambahDataAdmin"])->name("tambah-data-admin");
    Route::put("/data-admin/edit/{id}", [AdminManagerController::class, "EditDataAdmin"])->name("edit-data-admin");
    Route::delete("/data-admin/hapus/{id}", [AdminManagerController::class, "HapusDataAdmin"])->name("hapus-data-admin");

    Route::prefix("/log")->group(function () {
        Route::get("", [AdminManagerController::class, "Log"])->name("log-admin-manager");
        Route::delete("/hapus/{id}", [AdminManagerController::class, "HapusLog"])->name("hapus-log-admin-manager");
    });

    Route::post("/logout", [AdminManagerController::class, "Logout"])->name("logout-admin-manager");
});