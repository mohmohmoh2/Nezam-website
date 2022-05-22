<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $gard = null)
    {
        if (!auth()->guard($gard)->check()) {
            return redirect(route('admin.login'));
        }elseif (auth()->user()->admin == 0) {
            # code...
            return redirect(route('front.homepage'));
        } 
        return $next($request);
    }
}
