<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Session;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class AdminMiddleware
 *
 * Middleware for checking if the user has admin access.
 *
 * @package App\Http\Middleware
 */
class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Session::has(["id", "nama_pengguna"]))
            return redirect()->route("login")->with("error", 'Anda tidak memiliki akses sebagai admin.');

        return $next($request);
    }
}