<?php

namespace App;

use App\Traits\HasRoles;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Hash;
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
        'is_root' => 'bool',
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
     * Create a collaborator.
     *
     * @param  array $attributes
     * @return mixed
     */
    public static function createCollaborator(array $attributes)
    {
        $attributes['is_collaborator'] = true;

        return static::create($attributes);
    }

    /**
     * Make the hash of the password and set it.
     *
     * @param  string $password
     * @return void
     */
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }

    /**
     * Filter the end result to only collaborators.
     *
     * @param  Builder $query
     * @return Builder
     */
    public function scopeCollaborator(Builder $query)
    {
        return $query->where('is_collaborator', true);
    }

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

    public function isRoot()
    {
        return $this->is_root;
    }
}
