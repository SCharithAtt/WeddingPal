<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleGuard
{
    public function handle(Request $request, Closure $next, $role)
    {
        if (!Auth::check()) {
            return redirect()->route('login'); // Redirect to login if not authenticated
        }

        if (!Auth::user()->hasRole($role)) {
            return redirect('/'); // Redirect if user doesn't have the specified role
        }

        return $next($request);
    }
}
