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
        'date'
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

    public function getStartTimeFormattedAttribute()
    {
        return $this->formatTime($this->start_time);
    }

    public function getEndTimeFormattedAttribute()
    {
        return $this->formatTime($this->end_time);
    }

    protected function formatTime($time)
    {
        $pieces = explode(':', $time);
        $hours = '0' === $pieces[0][0] ? substr($pieces[0], 1) : $pieces[0];
        $minutes = '00' !== $pieces[1] ? $pieces[1] : '';

        return $hours.'h'.$minutes.'min';
    }
}
