<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class CheckGiangVien
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
        if(Session::has('ten_dang_nhap_giang_vien')){
            return $next($request);
        }
        else{
           return redirect()->route('giang_vien.login_giang_vien'); 
        }
    }
}