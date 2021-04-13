<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class AdminLogin
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
//        dd($_COOKIE['logininfo']);
//        dd(Hash::check('nowlogin',$_COOKIE['logininfo']));
        $cookie = $request->cookie('check');
        if($cookie!=null && Hash::check('nowlogin',$_COOKIE['check'])){
            return $next($request);
        }else{
            return redirect('ad/login');
        }
        return $next($request);
    }
}
