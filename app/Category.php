<?php

namespace App;

use App\Traits\CategoryScopes;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use CategoryScopes;

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Get the name along with the icon.
     *
     * @return string
     */
    public function getNameWithIconAttribute()
    {
        return "<i class=\"{$this->icon} fa-fw\"></i> {$this->name}";
    }

    /**
     * Retrieve a query to only the active courses.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function activeCourses()
    {
        return $this->courses()->where('active', true);
    }

    /**
     * A category is related to many courses based on its type.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function courses()
    {
        return $this->hasMany(Course::class, $this->type.'_id');
    }
}
