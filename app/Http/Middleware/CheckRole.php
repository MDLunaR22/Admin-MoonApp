<?php

namespace App\Http\Middleware;

use Closure;
use Hamcrest\Core\IsTypeOf;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string|array $role): Response
    {
        if (!$request->user() || $request->user()->hasRole($role)) {
            return redirect()->back();
        }
        return $next($request);
    }
}
