<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class GuestMiddleware
 *
 * Middleware for handling guest user access.
 *
 * @package App\Http\Middleware
 */
class GuestMiddleware
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
        return match (session()->get("peran"))
        {
            "admin" => redirect()->route("dashboard-admin"),
            "admin-manager" => redirect()->route("dashboard-admin-manager"),
            default => $next($request)
        };
    }
}