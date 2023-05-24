<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CustomerMiddleware
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
        if (!Auth::guard('account_customer')->check())
        {
            return redirect()->back();
        } elseif(Auth::guard('account_customer')->user()->status==0){
            Auth::guard('account_customer')->logout();
            return redirect()->back()->with('status','Vui lòng xác nhận email kích hoạt tài khoản của bạn.');
        }

        return $next($request);
    }
}
