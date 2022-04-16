<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StaffMiddleware
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
        
        if(Auth::check()){
            #admin can also access staff db when problem arises
            if (Auth::user()->role_as=="1") {
                #role_as == 1 = staff
                #role_as == 0 = admin
                # code...
                return $next($request);
            }
            else {
                # code...
                return redirect('/home')->with('status','Access Denied! Not an Staff.');
            }
        }else {
            #if not authenticated
            return redirect('/login')->with('status','Log In First!');
        }
    }
}
