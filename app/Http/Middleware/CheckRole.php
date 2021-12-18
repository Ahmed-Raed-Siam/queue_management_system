<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     * @param Request $request
     * @param Closure $next
     * @param string $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next, string $role = null)
    {
        if ($role === 'customer' && auth()->user()->role_id !== 1) {
            abort(403);
        }

        if ($role === 'employee' && auth()->user()->role_id !== 2) {
            abort(403);
        }

        return $next($request);
    }
}
