<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class EnsureUserIsTeacher
{
    /**
     * Handle an incoming request.
     */
    public function handle($request, Closure $next)
    {
        $user = Auth::user();

        // user লগইন না থাকলে বা role 'teacher' না হলে 403 দেখাবে
        if (! $user || $user->role !== 'teacher') {
            abort(403, 'Unauthorized access.');
        }

        return $next($request);
    }
}
