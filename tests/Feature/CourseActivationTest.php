<?php

namespace Tests\Feature;

use App\Course;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CourseActivationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function a_collaborator_can_activate_a_course()
    {
        $this->withoutExceptionHandling()
             ->signIn(['is_collaborator' => true]);

        $course = create(Course::class, ['active' => false]);

        $this->post(route('dashboard.courses.activation', $course));

        $this->assertTrue($course->fresh()->active);
    }

    /** @test */
    function a_collaborator_can_deactivate_a_course()
    {
        $this->withoutExceptionHandling()
            ->signIn(['is_collaborator' => true]);

        $course = create(Course::class, ['active' => true]);

        $this->delete(route('dashboard.courses.activation', $course));

        $this->assertFalse($course->fresh()->active);
    }
}
