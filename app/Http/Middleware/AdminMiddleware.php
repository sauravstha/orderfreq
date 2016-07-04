<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
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
        $role_count = $request->user()->roles()->where('name', 'Admin')->count();
        if($role_count >= 1)
            return $next($request);
        return response('Unauthorized.', 401);
        
    }
}
