<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class CheckGiaoVu
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
        if(Session::has('ten_dang_nhap')){
            return $next($request);
        }
        else{
           return redirect()->route('view_login'); 
        }
    }
}