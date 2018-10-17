<?php

namespace App;

use App\Traits\HasImage;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasImage;

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

    protected $defaultImagePath = 'images/default-course.jpg';

    /**
     * Get the collection of content.
     *
     * @param  string $content
     * @return \Illuminate\Support\Collection
     */
    public function getContentAttribute($content)
    {
        return collect(json_decode($content, true));
    }

    /**
     * Set the content attribute.
     *
     * @param  string|array|\JsonSerializable $value
     * @return void
     */
    public function setContentAttribute($value)
    {
        $this->setAttributeAsJson('content', $value);
    }

    /**
     * Get the collection of advantages.
     *
     * @param  string $advantages
     * @return Collection
     */
    public function getAdvantagesAttribute($advantages)
    {
        return collect(json_decode($advantages, true));
    }

    /**
     * Set the advantages attribute.
     *
     * @param  string|array|\JsonSerializable $value
     * @return void
     */
    public function setAdvantagesAttribute($value)
    {
        $this->setAttributeAsJson('advantages', $value);
    }

    /**
     * Activate the course.
     *
     * @return void
     */
    public function activate()
    {
        if (!$this->canBeActivated())
            throw new \Exception('O curso deve possuir ao menos uma turma para ser ativado');

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

    /**
     * A course has many teams.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function teams()
    {
        return $this->hasMany(Team::class);
    }

    public function canBeActivated()
    {
        return $this->teams()->exists();
    }

    /**
     * Set an attribute as JSON.
     *
     * @param  string $attribute
     * @param  mixed  $value
     * @return void
     */
    protected function setAttributeAsJson($attribute, $value)
    {
        if (is_string($value)) {
            $this->attributes[$attribute] = $value;

            return;
        }

        $this->attributes[$attribute] = json_encode($value);
    }
}
