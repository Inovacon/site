<?php

namespace Tests\Unit;

use App\Course;
use App\Lesson;
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

    /** @test */
    function it_can_fetch_the_lessons_associated_with_it()
    {
        $team = create(Team::class);
        create(Lesson::class, ['team_id' => $team], 2);

        $this->assertCount(2, $team->fresh()->lessons);
    }
}
