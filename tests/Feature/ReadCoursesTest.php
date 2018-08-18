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

    /** @test */
    function a_collaborator_can_view_a_single_course_in_the_dashboard()
    {
        $this->withoutExceptionHandling()
             ->signIn(['is_collaborator' => true]);

        $course = create(Course::class);

        $this->get(route('dashboard.courses.show', $course))
             ->assertSee($course->name);
    }

    /** @test */
    function a_normal_user_cannot_view_courses_in_the_dashboard()
    {
        $this->signIn(['is_collaborator' => false]);

        $course = create(Course::class);

        $this->get(route('dashboard.courses.index'))
             ->assertDontSee($course->name)
             ->assertForbidden();

        $this->get(route('dashboard.courses.show', $course))
            ->assertDontSee($course->name)
            ->assertForbidden();
    }

    /** @test */
    function a_guest_cannot_view_courses_in_the_dashboard()
    {
        $this->get(route('dashboard.courses.index'))
            ->assertRedirect(route('login'));

        $this->get(route('dashboard.courses.show', create(Course::class)))
            ->assertRedirect(route('login'));
    }

    /** @test */
    function a_user_can_view_all_available_courses()
    {
        $course1 = create(Course::class, ['active' => 1]);
        $course2 = create(Course::class, ['active' => 1]);

        $this->get(route('courses.index'))
            ->assertSee($course1->name)
            ->assertSee($course2->name);
    }

    /** @test */
    function a_user_can_filter_the_courses_by_those_that_have_the_same_occupation_area()
    {
        $course1 = create(Course::class, ['active' => true]);
        $course2 = create(Course::class, ['active' => true]);

        $this->get(route('courses.index').'?area='.$course1->occupationArea->id)
            ->assertSee($course1->name)
            ->assertDontSee($course2->name);

        $this->get(route('courses.index').'?area='.$course2->occupationArea->id)
            ->assertSee($course2->name)
            ->assertDontSee($course1->name);
    }

    /** @test */
    function a_user_can_view_a_single_course()
    {
        $course = create(Course::class, ['active' => true]);

        $this->get(route('courses.show', $course))
            ->assertSee($course->name);
    }

    /** @test */
    function a_course_should_only_be_visible_if_it_is_active()
    {
        $activeCourse = create(Course::class, ['active' => true]);
        $inactiveCourse = create(Course::class, ['active' => false]);

        $this->get(route('courses.index'))
            ->assertSee($activeCourse->name)
            ->assertDontSee($inactiveCourse->name);

        $this->get(route('courses.show', $inactiveCourse))
            ->assertNotFound();
    }
}
