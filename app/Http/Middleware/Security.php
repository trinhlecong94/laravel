<?php

namespace App\Http\Middleware;

use Closure;
use App\Enums\Role as EnumRole;

class Security
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if ($request->user() != null) {
            $request->user()->authorizeRoles([EnumRole::getValue($role)]);
            return $next($request);
        }

        return abort(401, 'This action is unauthorized.');
    }
}
