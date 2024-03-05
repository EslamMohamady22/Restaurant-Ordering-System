<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckStatus_for_admin
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
        if(Auth::id())
        {
            if(Auth::user()->usertype == '1')
            {
                return $next($request);
            }
            else
            {

                return redirect()->back();
            }
            
        }
        else
        {
            return redirect('/login');
        }
        
        
    }
}
