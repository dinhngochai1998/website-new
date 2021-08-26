<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role, $permission = null)
    {
        // use || for multiple roles
        if (strpos($role, '||') !== false) {
            $roles = explode(' || ', $role);
        } else {
            $roles = [$role];
        }
        if(!$request->user()->hasRole($roles)) {

             abort(404);

        }

        if($permission !== null && !$request->user()->can($permission)) {

              abort(404);
        }

        return $next($request);

    }
}
