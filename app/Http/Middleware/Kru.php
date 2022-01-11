<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Hash;

class Kru
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
        if ($request->session()->get("role") == "dawiejI@EWADjaduwoHEEH#@*AHD") {
            return $next($request);
        }else{
            return redirect('/');
        } 
    }
}
