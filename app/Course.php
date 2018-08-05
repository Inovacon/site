<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $guarded = ['active'];

    public function type()
    {
        return $this->belongsTo(Category::class, 'course_type_id')
                    ->where('type', 'course_type');
    }

    public function modality()
    {
        return $this->belongsTo(Category::class, 'modality_id')
                    ->where('type', 'modality');
    }

    public function shift()
    {
        return $this->belongsTo(Category::class, 'shift_id')
                    ->where('type', 'shift');
    }

    public function occupationArea()
    {
        return $this->belongsTo(Category::class, 'occupation_area_id')
                    ->where('type', 'occupation_area');
    }

    public function targetAudience()
    {
        return $this->belongsTo(Category::class, 'target_audience_id')
                    ->where('type', 'target_audience');
    }
}
