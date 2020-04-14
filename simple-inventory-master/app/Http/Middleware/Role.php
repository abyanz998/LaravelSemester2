<?php

namespace App\Http\Middleware;

use Closure;

class Role
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
      if(auth()->user()->role == 'admin'){
        return redirect('/barang');
      } elseif(auth()->user()->role == 'staff'){
        return redirect('/barangStaff/staff');
      }
        return $next($request);
    }
}
