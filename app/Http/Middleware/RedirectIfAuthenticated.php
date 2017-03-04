<?php

namespace Saberfront\Http\Middleware;
use Bouncer;
use Closure;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;


class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'active' => 1])) {

    $expiresAt = Carbon::now()->addMinutes(5);
    Cache::put('user-is-online-' . Auth::user()->id, true, $expiresAt);
               if(Auth::user()->id ==  1 && !Bouncer::is(Auth::user())->a('admin')){ 
                Bouncer::assign('admin')->to(Auth::user());
}
            return redirect('/home');
       }
        }

        return $next($request);
    }
}
