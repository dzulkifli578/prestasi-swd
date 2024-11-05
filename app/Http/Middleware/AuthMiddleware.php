<?php

namespace App\Http\Middleware;

use App\Models\Akun;
use App\Services\LogAkunService;
use Closure;
use Illuminate\Http\Request;

/**
 * Class AuthMiddleware
 *
 * Middleware for checking if the user is authenticated.
 *
 * @package App\Http\Middleware
 */
class AuthMiddleware
{
    private $logAkunService;

    public function __construct(LogAkunService $logAkunService)
    {
        $this->logAkunService = $logAkunService;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next)
    {
        $kredensial = $request->only("nama_pengguna", "kata_sandi");
        $akun = Akun::where("nama_pengguna", $kredensial["nama_pengguna"])->first();

        if (!$akun)
            return redirect()->back()->with("error", "Nama pengguna tidak ada.");

        if (!password_verify($kredensial["kata_sandi"], $akun->kata_sandi))
            return redirect()->back()->with("error", "Kata sandi tidak cocok.");

        session()->put([
            "id" => $akun->id,
            "nama_pengguna" => $akun->nama_pengguna,
            "peran" => $akun->peran,
            "foto" => $akun->foto
        ]);

        $this->logAkunService->log("Login", session("nama_pengguna") . " sudah login");

        return match (session()->get("peran"))
        {
            "admin" => redirect()->route("dashboard-admin"),
            "admin-manager" => redirect()->route("dashboard-admin-manager"),
            default => redirect()->route("login")
        };
    }
}