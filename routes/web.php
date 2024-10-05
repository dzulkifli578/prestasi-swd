<?php

use App\Http\Controllers\RootController;
use App\Http\Middleware\AuthMiddleware;
use Illuminate\Support\Facades\Route;

Route::prefix("/")->group(function () {
    Route::get("", [RootController::class, "Beranda"])->name("beranda");
    Route::get("prestasi", [RootController::class, "Prestasi"])->name("prestasi");
    Route::get("login", [RootController::class, "Login"])->name("login");
    Route::post("proses-login")->middleware(AuthMiddleware::class)->name("proses-login");
});