<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckActive
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $email = $request->user()->email;

        if ($request->user()->is_active == 1) {
            return $next($request);
        } else {
            Auth::logout();
            abort(405, $email);
            return;
        }
    }
}
