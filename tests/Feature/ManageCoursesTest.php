<?php

namespace Tests\Feature;

use App\Course;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ManageCoursesTest extends TestCase
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
    function a_collaborator_can_update_courses()
    {
        $this->withoutExceptionHandling()
             ->signIn(['is_collaborator' => true]);

        $course = create(Course::class);
        $updatedCourse = make(Course::class, ['name' => 'Nome editado']);

        $this->get(route('courses.edit', $course))
             ->assertOk();

        $this->patch(route('courses.update', $course), $updatedCourse->toArray())
             ->assertRedirect();

        $this->assertDatabaseHas($updatedCourse->getTable(), $updatedCourse->toArray());
    }

    /** @test */
    function a_course_cannot_be_written_with_empty_values()
    {
        $this->signIn(['is_collaborator' => true]);
        $data = $this->getEmptyValues();

        $this->post(route('courses.store'), $data)
             ->assertSessionHasErrors(array_keys($data));

        $this->patch(route('courses.update', create(Course::class)), $data)
             ->assertSessionHasErrors(array_keys($data));
    }

    /** @test */
    function a_guest_cannot_write_to_courses_table()
    {
        $this->get(route('courses.create'))
             ->assertRedirect(route('login'));

        $this->post(route('courses.store'))
             ->assertRedirect(route('login'));

        $this->get(route('courses.edit', 99))
            ->assertRedirect(route('login'));

        $this->patch(route('courses.update', 99))
            ->assertRedirect(route('login'));
    }

    /** @test */
    function a_non_collaborator_cannot_write_to_courses_table()
    {
        $this->signIn(['is_collaborator' => false]);

        $this->get(route('courses.create'))
             ->assertForbidden();

        $this->post(route('courses.store'))
             ->assertForbidden();

        $this->get(route('courses.edit', $course = create(Course::class)))
            ->assertForbidden();

        $this->patch(route('courses.update', $course))
            ->assertForbidden();
    }

    protected function getEmptyValues()
    {
        return array_map(function () {
            return ' ';
        }, raw(Course::class));
    }
}
