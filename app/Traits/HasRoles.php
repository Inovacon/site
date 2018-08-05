<?php

namespace App\Traits;

use App\Role;

trait HasRoles
{
    /**
     * Assign a role to the user.
     *
     * @param string $role
     */
    public function attachRole($role)
    {
        $this->roles()->save(Role::where('name', $role)->first());
    }

    /**
     * Determine whether the user has the given role.
     *
     * @param  string|array $role
     * @return bool
     */
    public function hasRole($role)
    {
        return $this->hasAnyRole($role);
    }

    /**
     * Determine whether the user has any of the given roles.
     *
     * @param  string|array $roles
     * @return bool
     */
    public function hasAnyRole($roles)
    {
        return $this->roles()
                    ->whereIn('name', is_array($roles) ? $roles : func_get_args())
                    ->exists();
    }

    /**
     * A user can have roles.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}
