<?php

namespace App\Http\Middleware;

use Closure;

class Rol
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
        if($request->user() && auth()->user()->rol !== "Administrador"){
            // return $next($request);
            // return redirect('/')->with('status', 'usted no tiene permiso');
            abort(404);
        }
        return $next($request);
    }
}
