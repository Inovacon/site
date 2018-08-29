<?php

namespace App\Http\Middleware;

use App\User;
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

        $this->authorizeUser($request->user(), $roles);

        return $next($request);
    }

    /**
     * Authorize the authenticated user.
     *
     * @param  User $user
     * @param  array $roles
     * @return void
     */
    protected function authorizeUser(User $user, array $roles)
    {
        abort_unless($user->isCollaborator(), 403);

        if (count($roles)) {
            abort_unless($user->hasAnyRole($roles), 403);
        }
    }
}
