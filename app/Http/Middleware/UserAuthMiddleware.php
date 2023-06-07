<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;

class UserAuthMiddleware
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
            return redirect(route('login'));
        } elseif (session()->has('LoggedUser')) {
            $user = User::where('id', '=', session('LoggedUser'))->first();
        }

        return $next($request);
    }
}
