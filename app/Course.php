<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $guarded = ['active'];

    public function type()
    {
        return $this->belongsTo(Category::class, 'course_type_id')->courseType();
    }

    public function modality()
    {
        return $this->belongsTo(Category::class, 'modality_id')->modality();
    }

    public function shift()
    {
        return $this->belongsTo(Category::class, 'shift_id')->shift();
    }

    public function occupationArea()
    {
        return $this->belongsTo(Category::class, 'occupation_area_id')->occupationArea();
    }

    public function targetAudience()
    {
        return $this->belongsTo(Category::class, 'target_audience_id')->targetAudience();
    }
}
