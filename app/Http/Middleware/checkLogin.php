<?php

namespace App\Http\Middleware;

use Closure;

class checkLogin
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
        // dd($request->session()->all());
        if($request->session()->has('ten_dang_nhap')){
            return redirect()->route("backHome");
        }
        return $next($request);
    }
}
