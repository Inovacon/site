<?php

namespace App;

use App\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, HasRoles;

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

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
     * Determine whether the user is an administrator.
     *
     * @return bool
     */
    public function isAdmin()
    {
        return $this->hasRole('admin');
    }
}
