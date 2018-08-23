<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateScheduleRequest;
use App\Team;
use Carbon\Carbon;

class ScheduleController extends Controller
{
    public function __invoke(CreateScheduleRequest $request, Team $team)
    {
        $first = Carbon::createFromFormat('d/m/Y', $request->first_day);
        $last = Carbon::createFromFormat('d/m/Y', $request->last_day);
        $weekDays = $request->week_days;
        $attributes = $request->only('start_time', 'end_time');

        while ($first->lte($last)) {
            if (in_array($first->dayOfWeek, $weekDays)) {
                $attributes['date'] = $first;
                $team->lessons()->create($attributes);
            }

            $first->addDays(1);
        }

        return back();
    }
}
