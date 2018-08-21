<?php

namespace Tests\Unit;

use App\Course;
use App\Team;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TeamTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function it_can_fetch_the_course_that_it_belongs_to()
    {
        $course = create(Course::class);
        $team = create(Team::class, ['course_id' => $course->id]);

        $this->assertInstanceOf(Course::class, $team->course);
    }
}
