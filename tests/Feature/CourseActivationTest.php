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

    /** @test */
    function a_guest_cannot_hit_the_activation_endpoints()
    {
        $this->post(route('dashboard.courses.activation', 99))
             ->assertRedirect(route('login'));

        $this->delete(route('dashboard.courses.activation', 99))
            ->assertRedirect(route('login'));
    }

    /** @test */
    function a_normal_user_cannot_hit_the_activation_endpoints()
    {
        $this->signIn(['is_collaborator' => false]);

        $course = create(Course::class);

        $this->post(route('dashboard.courses.activation', $course))
            ->assertForbidden();

        $this->delete(route('dashboard.courses.activation', $course))
            ->assertForbidden();
    }
}
