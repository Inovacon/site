<?php

namespace Tests\Feature;

use App\Course;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
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

        $this->get(route('dashboard.courses.create'))
             ->assertOk();

        $course = make(Course::class);

        $this->post(route('dashboard.courses.store'), $course->toArray())
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

        $this->get(route('dashboard.courses.edit', $course))
             ->assertOk();

        $this->patch(route('dashboard.courses.update', $course), $updatedCourse->toArray())
             ->assertRedirect();

        $this->assertDatabaseHas($updatedCourse->getTable(), $updatedCourse->toArray());
    }

    /** @test */
    function a_course_cannot_be_written_with_empty_values()
    {
        $this->signIn(['is_collaborator' => true]);
        $data = $this->getEmptyValues();

        $this->post(route('dashboard.courses.store'), $data)
             ->assertSessionHasErrors(array_keys($data));

        $this->patch(route('dashboard.courses.update', create(Course::class)), $data)
             ->assertSessionHasErrors(array_keys($data));
    }

    /** @test */
    function a_guest_cannot_write_to_courses_table()
    {
        $this->get(route('dashboard.courses.create'))
             ->assertRedirect(route('login'));

        $this->post(route('dashboard.courses.store'))
             ->assertRedirect(route('login'));

        $this->get(route('dashboard.courses.edit', $c = create(Course::class)))
            ->assertRedirect(route('login'));

        $this->patch(route('dashboard.courses.update', $c))
            ->assertRedirect(route('login'));
    }

    /** @test */
    function a_non_collaborator_cannot_write_to_courses_table()
    {
        $this->signIn(['is_collaborator' => false]);

        $this->get(route('dashboard.courses.create'))
             ->assertForbidden();

        $this->post(route('dashboard.courses.store'))
             ->assertForbidden();

        $this->get(route('dashboard.courses.edit', $course = create(Course::class)))
            ->assertForbidden();

        $this->patch(route('dashboard.courses.update', $course))
            ->assertForbidden();
    }

    /** @test */
    function a_course_may_have_an_image_associated()
    {
        $this->signIn(['is_collaborator' => true]);

        Storage::fake('public');

        $this->post(route('dashboard.courses.store'), raw(Course::class, [
            'image_path' => $file = UploadedFile::fake()->image('curso.jpg'),
        ]));

        $course = Course::first();

        Storage::disk('public')->assertExists('courses/'.$file->hashName());

        $this->patch(route('dashboard.courses.update', $course), raw(Course::class, [
            'image_path' => $file = UploadedFile::fake()->image('another-image.jpg'),
        ]));

        Storage::disk('public')->assertExists('courses/'.$file->hashName());
    }

    /** @test */
    function a_course_cannot_be_written_with_an_invalid_image()
    {
        $this->signIn(['is_collaborator' => true]);

        Storage::fake('public');

        $this->post(route('dashboard.courses.store'), raw(Course::class, ['image_path' => 'invalid-image']))
             ->assertSessionHasErrors(['image_path']);

        $this->patch(route('dashboard.courses.update', create(Course::class)), raw(Course::class, [
            'image_path' => 'invalid-image-2'
        ]))->assertSessionHasErrors(['image_path']);
    }

    /** @test */
    function when_a_course_is_updated_with_a_new_image_the_old_one_must_be_deleted_from_the_filesystem()
    {
        $this->signIn(['is_collaborator' => true]);
        Storage::fake('public');

        $imagePath = UploadedFile::fake()->image('image.jpg')->store('courses', 'public');
        $course = create(Course::class, ['image_path' => $imagePath]);

        Storage::disk('public')->assertExists($imagePath);

        $this->patch(route('dashboard.courses.update', $course), raw(Course::class, [
            'image_path' => $file = UploadedFile::fake()->image('another-image.jpg'),
        ]));

        Storage::disk('public')->assertMissing($imagePath);
        Storage::disk('public')->assertExists("courses/{$file->hashName()}");
    }

    protected function getEmptyValues()
    {
        return array_map(function () {
            return ' ';
        }, raw(Course::class));
    }
}
