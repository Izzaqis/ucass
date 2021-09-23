<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsCommittee
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(auth()->user()->is_approve == 1){
            return $next($request);
        }

        return redirect('home')->with('error',"Only admin can access!");

        if (auth()->user()->is_admin == 1) {
            return redirect()->route('admin.home');
        }
        elseif (auth()->user()->is_committee == 1) {
        return redirect()->route('committee');
        }
        else{
            return redirect()->route('home');
        }
    }
}

