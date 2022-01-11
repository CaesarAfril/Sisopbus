<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use DB;

class Admin
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
        $check = DB::table('tb_admin')->pluck('UQ');
        foreach ($check as $a)
        if ($request->session()->get("role") == $a) {
            return $next($request);
        }else{
            return redirect('/');
        } 
    }
}
