<?php

namespace App\Http\Middleware;

use Closure;

class MustBeCollaborator
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure                 $next
     * @param  array                    $roles
     * @return mixed
     */
    public function handle($request, Closure $next, ...$roles)
    {
        if (auth()->guest()) {
            return redirect()->route('login');
        }

        $user = $request->user();

        abort_unless($user->isCollaborator(), 403);

        if (count($roles)) {
            abort_unless($user->hasAnyRole($roles), 403);
        }

        return $next($request);
    }
}
