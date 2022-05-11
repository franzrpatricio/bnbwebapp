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
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        #CHECK USER IF LOGGED IN
        if(Auth::check()){
            if (Auth::user()->role_as=='0' ||Auth::user()->role_as=='1') {
                #role_as == 0 = staff
                #role_as == 1 = admin
                # code... 
                return $next($request);
            }else {
                # code...
                return redirect('/home')->with('status','Access Denied! Not an Admin.');
            }
        }else {
            #if not authenticated
            return redirect('/login')->with('msg','Log In First!');
        }
    }
}
