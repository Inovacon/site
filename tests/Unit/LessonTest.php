<?php

namespace Tests\Unit;

use App\Lesson;
use App\Team;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LessonTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function it_accepts_the_date_in_standard_format()
    {
        $lesson = create(Lesson::class, [
            'date' => '1999-11-10',
            'team_id' => create(Team::class)
        ]);

        $this->assertStringStartsWith('1999-11-10', $lesson->fresh()->date);
    }

    /** @test */
    function it_accepts_the_date_in_brazilian_format()
    {
        $lesson = create(Lesson::class, [
            'date' => '10/11/1999',
            'team_id' => create(Team::class)
        ]);

        $this->assertStringStartsWith('1999-11-10', $lesson->fresh()->date);
    }
}
