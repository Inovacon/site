<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait CategoryScopes
{
    /**
     * Add a filter to the query to only return modalities.
     *
     * @param  Builder $query
     * @return Builder
     */
    public function scopeModality(Builder $query)
    {
        return $query->where('type', 'modality');
    }

    /**
     * Add a filter to the query to only return course types.
     *
     * @param  Builder $query
     * @return Builder
     */
    public function scopeCourseType(Builder $query)
    {
        return $query->where('type', 'course_type');
    }

    /**
     * Add a filter to the query to only return occupation areas.
     *
     * @param  Builder $query
     * @return Builder
     */
    public function scopeOccupationArea(Builder $query)
    {
        return $query->where('type', 'occupation_area');
    }

    /**
     * Add a filter to the query to only return target audiences.
     *
     * @param  Builder $query
     * @return Builder
     */
    public function scopeTargetAudience(Builder $query)
    {
        return $query->where('type', 'target_audience');
    }
}
