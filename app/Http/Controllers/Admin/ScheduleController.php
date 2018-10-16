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
        $i = 0;
        $weekDays = $request->week_days;
        $startTimes = $request->start_times;
        $endTimes = $request->end_times;
        $currentDay = Carbon::createFromFormat('d/m/Y', $request->first_day);
        $lastDay = Carbon::createFromFormat('d/m/Y', $request->last_day);

        while ($currentDay->lte($lastDay)) {
            if (in_array($currentDay->dayOfWeek, $weekDays)) {
                if (count($weekDays) <= $i) {
                    $i = 0;
                }

                $team->lessons()->create([
                    'date' => $currentDay,
                    'start_time' => $startTimes[$i],
                    'end_time' => $endTimes[$i]
                ]);

                ++$i;
            }

            $currentDay->addDays(1);
        }

        return redirect()
            ->route('dashboard.courses.lessons.index', $team)
            ->with('flash', 'Cronograma de aulas criado com sucesso.');
    }
}
