<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckPermissionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // get current logged in user
        $currentUser = $request->user();

        // get current action name
        $currentActionName = $request->route()->getActionName();

        list($controller, $method) = explode('@', $currentActionName);

        $controller = str_replace(["App\\Http\\Controllers\\Admin\\"], "", $controller);

        $crudPermissionsMap = [
            'crud' => ['index', 'create', 'store', 'edit', 'update', 'destroy', 'restore', 'forceDestroy']
        ];

        $classesMap = [
            'UserController' => 'admin',
            'PostController' => 'post',
            'CategoryController' => 'category',
            'EventController' => 'event',
            'MemberController' => 'member'
        ];

        foreach ($crudPermissionsMap as $permission => $methods) {
            // if the current method exists in methods list ,
            // we will check the permission
            if (in_array($method, $methods) && isset($classesMap[$controller])) {

                $className = $classesMap[$controller];

                // if the user has no permission don't allow next request
                if (!$currentUser->isAbleTo("{$permission}-{$className}")) {
                    abort(404);
                }
                break;
            }
        }

        return $next($request);
    }
}
