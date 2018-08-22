<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class Lesson extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'date',
    ];

    /**
     * Set the date attribute.
     *
     * @param  string $date
     * @return void
     */
    public function setDateAttribute($date)
    {
        if (Str::is('*/*/*', $date)) {
            $this->attributes['date'] = Carbon::createFromFormat('d/m/Y', $date);

            return;
        }

        $this->attributes['date'] = $date;
    }
}
