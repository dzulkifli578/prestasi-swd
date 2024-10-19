<?php

namespace App\Http\Middleware;

use App\Models\Akun;
use App\Services\LogAkunService;
use Closure;
use Illuminate\Http\Request;
use Session;

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
        $credentials = $request->only("nama_pengguna", "kata_sandi");
        $akun = Akun::where("nama_pengguna", $credentials["nama_pengguna"])->first();

        if (!$akun)
            return redirect()->back()->with("error", "Nama pengguna tidak ada.");

        if (!password_verify($credentials["kata_sandi"], $akun->kata_sandi))
            return redirect()->back()->with("error", "Kata sandi tidak cocok.");

        Session::put([
            "id" => $akun->id,
            "nama_pengguna" => $akun->nama_pengguna,
            "foto" => $akun->foto
        ]);

        $this->logAkunService->log("Login", session("nama_pengguna") . " sudah login");

        return redirect()->route("dashboard");
    }
}