<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

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
            return redirect(RouteServiceProvider::HOME);
        }

        if ($request->ajax() || $request->wantsJson()) {
            return response(['status'=>false,'message'=>'Unauthorized.'], 401);
        }
        
        switch ($guard) 
        {
            case 'web':
            if(Auth::guard($guard)->check()){
                return redirect('/admin');
            }
            break;

            case 'api':
            if(Auth::guard($guard)->check()){
                return response()->json(['status'=>true,'message' => 'User has been successfully login.'], 200);
            }
            break;
            
            default:
            if (Auth::guard($guard)->check()) {
                return redirect('/admin');
            }
            break;
        }
        return $next($request);
    }
}
