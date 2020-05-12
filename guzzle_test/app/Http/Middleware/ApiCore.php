<?php

namespace App\Http\Middleware;

use Closure;

class ApiCore
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
        if($request->getMethod() == "OPTIONS"){
            return response()->make('OK', 200, $headers);
        }
        $response=$next($request);
        return $response;
    }
}
