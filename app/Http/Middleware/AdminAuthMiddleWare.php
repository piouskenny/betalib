<?php

namespace App\Http\Middleware;

use App\Models\Admin;
use Closure;
use Illuminate\Http\Request;

class AdminAuthMiddleWare
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
        if (!session()->has('LoggedUser')) {
            return redirect('/bl-admin/login');
        } elseif (session()->has('LoggedUser')) {
            $user = Admin::where('id', session('LoggedUser'))->first();
        }

        return $next($request);
    }
}
