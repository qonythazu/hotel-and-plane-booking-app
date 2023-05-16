<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class checkMitraAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() && in_array(auth()->user()->role->role, ['mitra', 'admin'])) {
            return $next($request);
        }

        abort(403);
    }
}
