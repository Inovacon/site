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
}
