<?php

namespace Tests\Feature;

use App\Course;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateCourseTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function an_admin_can_create_courses()
    {
        $this->withoutExceptionHandling()
             ->asAdmin();

        $course = make(Course::class);

        $this->post(route('courses.store'), $course->toArray());

        $this->assertDatabaseHas($course->getTable(), $course->toArray());
    }

    /** @test */
    function a_normal_user_cannot_create_courses()
    {
        $this->signIn();

        $course = make(Course::class);

        $this->post(route('courses.store'), $course->toArray())
             ->assertForbidden();

        $this->assertDatabaseMissing($course->getTable(), $course->toArray());
    }

    /** @test */
    function a_course_requires_a_name()
    {
        $this->asAdmin()
             ->post(route('courses.store'), ['name' => ' '])
             ->assertSessionHasErrors(['name']);
    }

    /** @test */
    function a_course_requires_a_description()
    {
        $this->asAdmin()
             ->post(route('courses.store'), ['description' => ' '])
             ->assertSessionHasErrors(['description']);
    }

    /** @test */
    function a_course_requires_a_target_audience()
    {
        $this->asAdmin()
             ->post(route('courses.store'), ['target_audience' => ' '])
             ->assertSessionHasErrors(['target_audience']);
    }

    /** @test */
    function a_course_requires_a_price_and_it_must_be_numeric()
    {
        $this->asAdmin()
             ->post(route('courses.store'), ['price' => ' '])
             ->assertSessionHasErrors(['price']);

        $this->post(route('courses.store'), ['price' => 'asdsad'])
             ->assertSessionHasErrors(['price']);
    }

    /** @test */
    function a_course_requires_a_minimum_number_of_students_and_must_be_an_integer()
    {
        $this->asAdmin()
             ->post(route('courses.store'), ['minimum_students' => ' '])
             ->assertSessionHasErrors(['minimum_students']);

        $this->post(route('courses.store'), ['minimum_students' => 21.25])
             ->assertSessionHasErrors(['minimum_students']);
    }

    /** @test */
    function a_course_requires_a_maximum_number_of_students_and_must_be_an_integer()
    {
        $this->asAdmin()
             ->post(route('courses.store'), ['maximum_students' => ' '])
             ->assertSessionHasErrors(['maximum_students']);

        $this->post(route('courses.store'), ['maximum_students' => 21.25])
             ->assertSessionHasErrors(['maximum_students']);
    }

    /** @test */
    function a_course_requires_a_number_of_hours_and_must_be_numeric()
    {
        $this->asAdmin()
             ->post(route('courses.store'), ['hours' => ' '])
             ->assertSessionHasErrors(['hours']);

        $this->post(route('courses.store'), ['hours' => 'asdasd'])
             ->assertSessionHasErrors(['hours']);
    }

    /** @test */
    function a_course_requires_a_course_type_id()
    {
        $this->asAdmin()
             ->post(route('courses.store'), ['course_type_id' => ' '])
             ->assertSessionHasErrors(['course_type_id']);
    }

    /** @test */
    function a_course_requires_a_modality_id()
    {
        $this->asAdmin()
             ->post(route('courses.store'), ['modality_id' => ' '])
             ->assertSessionHasErrors(['modality_id']);
    }

    /** @test */
    function a_course_requires_a_shift_id()
    {
        $this->asAdmin()
             ->post(route('courses.store'), ['shift_id' => ' '])
             ->assertSessionHasErrors(['shift_id']);
    }

    /** @test */
    function a_course_requires_an_occupation_area_id()
    {
        $this->asAdmin()
             ->post(route('courses.store'), ['occupation_area_id' => ' '])
             ->assertSessionHasErrors(['occupation_area_id']);
    }
}
