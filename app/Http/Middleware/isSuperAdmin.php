<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class isSuperAdmin
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
        if (Auth::user()) {
            if (Auth::user()->isSuperAdmin) {
                return $next($request);
            }
            return redirect(route('company.showCompany', [Auth::user()->company_id]));
        }
        return redirect('login');
    }
}