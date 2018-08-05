<?php

namespace Tests\Feature;

use App\Course;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateCoursesTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function a_collaborator_can_create_courses()
    {
        $this->withoutExceptionHandling()
             ->signIn(['is_collaborator' => true]);

        $this->get(route('courses.create'))
             ->assertOk();

        $course = make(Course::class);

        $this->post(route('courses.store'), $course->toArray())
             ->assertRedirect();

        $this->assertDatabaseHas($course->getTable(), $course->toArray());
    }

    /** @test */
    function a_course_cannot_be_created_with_empty_values()
    {
        $this->signIn(['is_collaborator' => true]);

        $courseData = array_map(function () {
            return ' ';
        }, raw(Course::class));

        $this->post(route('courses.store'), $courseData)
             ->assertSessionHasErrors(array_keys($courseData));
    }

    /** @test */
    function a_guest_cannot_create_courses()
    {
        $this->get(route('courses.create'))
             ->assertRedirect(route('login'));

        $this->post(route('courses.store'))
            ->assertRedirect(route('login'));
    }

    /** @test */
    function a_non_collaborator_cannot_create_courses()
    {
        $this->signIn(['is_collaborator' => false]);

        $this->get(route('courses.create'))
             ->assertForbidden();

        $this->post(route('courses.store'))
             ->assertForbidden();
    }
}
