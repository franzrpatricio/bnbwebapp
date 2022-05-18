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
        if(Auth::check()){
            if (Auth::user()->status=='1') {
                #role_as == 0 = staff
                #role_as == 1 = admin
                # code... 
                #if status is 0, the user will be blocked when trying to access the dashboard.
                #let admin edit the user status, only then the user will have the access to the dashboard.
                return $next($request);
            }else {
                # code...
                return redirect('/home')->with('error','Access Denied!');
            }
        }else {
            #if not authenticated
            return redirect('/login')->with('status','Log In First!');
        }
    }
}
