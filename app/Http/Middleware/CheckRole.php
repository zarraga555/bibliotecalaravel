<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
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
        if( $request->user() && auth()->user()->rol !== "Asistente"){
            // return abort(404);
            if($request->user() && auth()->user()->rol !== "Administrador"){
            return abort(404);
            }
        }
        return $next($request);
    }
}
