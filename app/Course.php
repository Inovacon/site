<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;

class Course extends Model
{
    /**
     * The attributes that aren't mass assignable.
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
        'active' => 'bool',
    ];

    /**
     * Set the image_path attribute.
     *
     * @param  string|UploadedFile $path
     * @return void
     */
    public function setImagePathAttribute($path)
    {
        $this->attributes['image_path'] = $path instanceof UploadedFile
            ? $path->store('courses', 'public')
            : $path;
    }

    /**
     * Get the publicly accessible image path.
     *
     * @return string
     */
    public function getPublicImagePathAttribute()
    {
        return asset(
            "storage/{$this->image_path}" ?: 'images/default-course.png'
        );
    }

    /**
     * Get the icon associated with the course.
     *
     * @param  string|null $icon
     * @return string
     */
    public function getIconAttribute($icon)
    {
        return $icon ?: 'fas fa-graduation-cap';
    }

    /**
     * Activate the course.
     *
     * @return void
     */
    public function activate()
    {
        $this->update(['active' => true]);
    }

    /**
     * Deactivate the course.
     *
     * @return void
     */
    public function deactivate()
    {
        $this->update(['active' => false]);
    }

    /**
     * A course has a type.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function type()
    {
        return $this->belongsTo(Category::class, 'course_type_id')->courseType();
    }

    /**
     * A course has a modality.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function modality()
    {
        return $this->belongsTo(Category::class, 'modality_id')->modality();
    }

    /**
     * A course has a shift.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function shift()
    {
        return $this->belongsTo(Category::class, 'shift_id')->shift();
    }

    /**
     * A course has an occupation area.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function occupationArea()
    {
        return $this->belongsTo(Category::class, 'occupation_area_id')->occupationArea();
    }

    /**
     * A course has a target audience.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function targetAudience()
    {
        return $this->belongsTo(Category::class, 'target_audience_id')->targetAudience();
    }
}
