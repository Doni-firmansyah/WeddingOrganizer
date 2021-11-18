<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AllMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        if (Auth::user()->role == 'Finance'){
            return $next($request);
          } elseif (Auth::user()->role == 'Ceo') {
            return $next($request);
          } elseif (Auth::user()->role == 'Vendormanagent') {
            return $next($request);
          } elseif (Auth::user()->role == 'Clientmanagent') {
            return $next($request);
          } elseif (Auth::user()->role == 'admin') {
            return $next($request);
          }else {
            return redirect('/');
        }
    }
}
