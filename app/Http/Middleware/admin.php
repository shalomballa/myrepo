<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Admin\Middleware\Admin as Middleware;

class admin
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
        if (!$request->session()->exists('user')) {
            // user value cannot be found in session
            return back()->with('error', 'entrez un lien valide');
        }
        else if (session('user')->user_type == 1){

        }
        else{
            return back()->with('error', 'entrez un lien valide');
        }

        return $next($request);
    }
}
