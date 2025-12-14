<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class EnsureUserIsAdmin
{
    public function handle($request, Closure $next)
    {
        $user = Auth::user();

        if (! $user || $user->role !== 'admin') {
            abort(403, 'Unauthorized access.');
        }

        return $next($request);
    }
}
