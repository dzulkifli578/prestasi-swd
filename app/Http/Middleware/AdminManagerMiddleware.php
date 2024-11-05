<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Session;
use Symfony\Component\HttpFoundation\Response;

class AdminManagerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Session::has(["id", "nama_pengguna"]) || Session::get("peran") != "admin-manager")
            return redirect()->route("login")->with("error", 'Anda tidak memiliki akses sebagai admin manager.');

        return $next($request);
    }
}
