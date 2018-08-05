<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'is_collaborator',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'is_collaborator' => 'bool',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Determine whether the user is a collaborator.
     *
     * @return bool
     */
    public function isCollaborator()
    {
        return $this->is_collaborator;
    }

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
     * @param  string $role
     * @return bool
     */
    public function hasRole($role)
    {
        return $this->roles()->where('name', $role)->exists();
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
