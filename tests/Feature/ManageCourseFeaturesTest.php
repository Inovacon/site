<?php

namespace Tests\Feature;

use App\Course;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ManageCourseFeaturesTest extends TestCase
{
    use RefreshDatabase;

    protected $course;

    protected function setUp()
    {
        parent::setUp();

        $this->course = create(Course::class);
    }

    /** @test */
    function a_collaborator_can_associate_content_to_courses()
    {
        $this->withoutExceptionHandling()
            ->signIn(['is_collaborator' => true]);

        $this->postJson(route('dashboard.courses.content.store', $this->course), [
            'name' => 'some content here',
        ])->assertStatus(201);

        $this->assertTrue($this->course->fresh()->content->contains('some content here'));
    }

    /** @test */
    function a_course_content_requires_a_name()
    {
        $this->signIn(['is_collaborator' => true])
            ->post(route('dashboard.courses.content.store', $this->course), [
                'name' => ' ',
            ])
            ->assertSessionHasErrors('name');

        $this->patch(route('dashboard.courses.content.update', [$this->course, -1]), [
            'name' => ' ',
        ])->assertSessionHasErrors('name');
    }

    /** @test */
    function a_collaborator_can_view_all_the_content_associated_with_the_course()
    {
        $this->signIn(['is_collaborator' => true]);

        $this->course->update([
            'content' => ['first content', 'second', 'and then the third']
        ]);

        $response = $this->getJson(route('dashboard.courses.content.index', $this->course))->json();

        $this->assertCount(3, $response);
        $this->assertSame(
            [
                ['index' => 0, 'content' => 'first content'],
                ['index' => 1, 'content' => 'second'],
                ['index' => 2, 'content' => 'and then the third'],
            ],
            $response
        );
    }

    /** @test */
    function a_collaborator_can_delete_a_course_content()
    {
        $this->withoutExceptionHandling()
            ->signIn(['is_collaborator' => true]);

        $this->course->update([
            'content' => ['first content', 'second', 'and then the third']
        ]);

        $index = 1;

        $this->deleteJson(route('dashboard.courses.content.destroy', [$this->course, $index]))
            ->assertStatus(204);

        $this->assertSame(
            ['first content', 'and then the third'],
            $this->course->fresh()->content->all()
        );
    }

    /** @test */
    function a_collaborator_can_update_a_course_content()
    {
        $this->withoutExceptionHandling()
            ->signIn(['is_collaborator' => true]);

        $this->course->update([
            'content' => ['first content', 'second', 'and then the third']
        ]);

        $index = 1;

        $this->patchJson(route('dashboard.courses.content.update', [$this->course, $index]), [
            'name' => 'second, but updated'
        ])->assertStatus(204);

        $this->assertSame(
            ['first content', 'second, but updated', 'and then the third'],
            $this->course->fresh()->content->all()
        );
    }

    /** @test */
    function a_normal_user_cannot_manage_course_content()
    {
        $this->signIn();

        $this->get(route('dashboard.courses.content.index', $this->course))
            ->assertForbidden();

        $this->post(route('dashboard.courses.content.store', $this->course))
            ->assertForbidden();

        $this->patch(route('dashboard.courses.content.update', [$this->course, -1]))
            ->assertForbidden();

        $this->delete(route('dashboard.courses.content.destroy', [$this->course, -1]))
            ->assertForbidden();
    }

    /** @test */
    function a_collaborator_can_associate_advantages_to_a_course()
    {
        $this->withoutExceptionHandling()
            ->signIn(['is_collaborator' => true]);

        $this->postJson(route('dashboard.courses.advantages.store', $this->course), [
            'name' => 'the best of the world.'
        ])->assertStatus(201);

        $this->assertTrue($this->course->fresh()->advantages->contains('the best of the world.'));
    }

    /** @test */
    function a_course_advantage_requires_a_name()
    {
        $this->signIn(['is_collaborator' => true])
            ->post(route('dashboard.courses.advantages.store', $this->course), [
                'name' => ' ',
            ])
            ->assertSessionHasErrors('name');

        $this->patch(route('dashboard.courses.advantages.update', [$this->course, -1]), [
            'name' => ' ',
        ])->assertSessionHasErrors('name');
    }

    /** @test */
    function a_collaborator_can_view_all_the_advantages_associated_with_the_course()
    {
        $this->signIn(['is_collaborator' => true]);

        $this->course->update([
            'advantages' => ['first advantage', 'second advantage', 'and then a third one']
        ]);

        $response = $this->getJson(route('dashboard.courses.advantages.index', $this->course))->json();

        $this->assertCount(3, $response);
        $this->assertSame(
            [
                ['index' => 0, 'content' => 'first advantage'],
                ['index' => 1, 'content' => 'second advantage'],
                ['index' => 2, 'content' => 'and then a third one'],
            ],
            $response
        );
    }

    /** @test */
    function a_collaborator_can_delete_a_course_advantage()
    {
        $this->withoutExceptionHandling()
            ->signIn(['is_collaborator' => true]);

        $this->course->update([
            'advantages' => ['first', 'second', 'third']
        ]);

        $index = 0;

        $this->deleteJson(route('dashboard.courses.advantages.destroy', [$this->course, $index]))
            ->assertStatus(204);

        $this->assertSame(
            ['second', 'third'],
            $this->course->fresh()->advantages->all()
        );
    }

    /** @test */
    function a_collaborator_can_update_a_course_advantage()
    {
        $this->withoutExceptionHandling()
            ->signIn(['is_collaborator' => true]);

        $this->course->update([
            'advantages' => ['first', 'second', 'third']
        ]);

        $index = 1;

        $this->patchJson(route('dashboard.courses.advantages.update', [$this->course, $index]), [
            'name' => 'second, but updated'
        ])->assertStatus(204);

        $this->assertSame(
            ['first', 'second, but updated', 'third'],
            $this->course->fresh()->advantages->all()
        );
    }

    /** @test */
    function a_normal_user_cannot_manage_course_advantages()
    {
        $this->signIn();

        $this->get(route('dashboard.courses.advantages.index', $this->course))
            ->assertForbidden();

        $this->post(route('dashboard.courses.advantages.store', $this->course))
            ->assertForbidden();

        $this->patch(route('dashboard.courses.advantages.update', [$this->course, -1]))
            ->assertForbidden();

        $this->delete(route('dashboard.courses.advantages.destroy', [$this->course, -1]))
            ->assertForbidden();
    }
}
