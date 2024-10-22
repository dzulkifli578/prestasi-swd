<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\RootController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\AuthMiddleware;
use App\Http\Middleware\GuestMiddleware;
use Illuminate\Support\Facades\Route;

Route::prefix("/")->group(function () {
    Route::get("", [RootController::class, "Beranda"])->name("beranda");
    Route::get("prestasi", [RootController::class, "Prestasi"])->name("prestasi");
    Route::get("tentang", [RootController::class, "Tentang"])->name("tentang");
    Route::get("login", [RootController::class, "Login"])->name("login");
    Route::post("proses-login")->middleware(AuthMiddleware::class)->name("proses-login");
});

Route::prefix("/login")->middleware(GuestMiddleware::class)->group(function () {
    Route::get("", [RootController::class, "Login"])->name("login");
    Route::post("/proses")->middleware(AuthMiddleware::class)->name("proses-login");
});

Route::prefix("/admin")->middleware(AdminMiddleware::class)->group(function () {
    Route::get("/dashboard", [AdminController::class, "Dashboard"])->name("dashboard");
    Route::get("/profil", [AdminController::class, "Profil"])->name("profil");
    Route::put("/profil/perbarui", [AdminController::class, "PerbaruiProfil"])->name("perbarui-profil");

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

    Route::get("/log", [AdminController::class, "Log"])->name("log");

    Route::post("/logout", [AdminController::class, "Logout"])->name("logout");
});
