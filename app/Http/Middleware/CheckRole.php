<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class CheckRole
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

        if (Auth::guest()) {
            return redirect()->intended('account')->with('status','Bạn phải đăng nhập tài khoản admin mới được quyền vào chức năng Admin!');
        }
        if (Auth::check()) {

            if ((Auth::user()->role_id == 1)) {
               return redirect()->intended('/');
            }          
        }
        return $next($request);
    }
}
