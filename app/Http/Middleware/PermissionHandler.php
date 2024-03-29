<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Spatie\Permission\Exceptions\UnauthorizedException;

class PermissionHandler
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
        if (app('auth')->guest()) {
            throw UnauthorizedException::notLoggedIn();
        }

        $routeName = $request->route()->getName();

        if (in_array($routeName, config('permission.excluded_routes'))) {
            return $next($request);
        }

        $routePartials = explode('.', $routeName);


        $page = $routePartials[1];
        $action = $routePartials[2];

        switch (true) {
            case in_array($action, ['index', 'show']):
                $permission = $page .' view';
                break;

            case in_array($action, ['create', 'store']):
                $permission = $page .' create';
                break;

            case in_array($action, ['edit', 'update']):
                $permission = $page .' edit';
                break;

            case in_array($action, ['destroy']):
                $permission = $page .' delete';
                break;

            default:
                $permission = $page .' '. $action;
                break;
        }

        if (app('auth')->user()->can($permission)) {
            return $next($request);
        }

        throw UnauthorizedException::forPermissions([$permission]);
    }
}
