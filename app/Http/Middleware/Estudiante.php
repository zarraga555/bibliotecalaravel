<?php

namespace App\Http\Middleware;

use Closure;

class Estudiante
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
        if(auth()->check() && auth()->user()->rol == "Estudiante"){
            return $next($request);
            return redirect('/')->with('status', 'usted no tiene permiso');
        }
        abort(404);
    }
}
