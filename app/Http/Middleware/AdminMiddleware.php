<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
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
        // Kiểm tra nếu người dùng không phải là admin
        if (Auth::check() && Auth::user()->role_id != 1) {
            // Điều hướng người dùng không phải admin về trang khách hàng
            return redirect()->route('client.home');
        }

        return $next($request);
    }
}

