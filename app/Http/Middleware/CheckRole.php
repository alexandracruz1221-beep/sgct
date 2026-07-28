<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, string ...$roles): Response
    {
        if (! $request->user()) {
            abort(401);
        }

        $allowedRoles = collect($roles)
            ->flatMap(fn (string $roleGroup) => explode('|', $roleGroup))
            ->map(fn (string $role) => trim($role))
            ->filter()
            ->values()
            ->all();

        $userRoleKey = $request->user()->role?->key;

        if (! in_array($userRoleKey, $allowedRoles, true)) {
            abort(403);
        }

        return $next($request);
    }
}
