<?php

namespace Tests\Feature;

use App\Course;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReadCoursesTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function a_collaborator_can_view_all_courses_in_the_dashboard()
    {
        $this->withoutExceptionHandling()
             ->signIn(['is_collaborator' => true]);

        $course = create(Course::class);

        $this->get(route('dashboard.courses.index'))
             ->assertSee($course->name);
    }
}
