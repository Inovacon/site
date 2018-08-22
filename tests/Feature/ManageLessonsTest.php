<?php

namespace Tests\Feature;

use App\Lesson;
use App\Team;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ManageLessonsTest extends TestCase
{
    use RefreshDatabase;

    protected $team;

    protected function setUp()
    {
        parent::setUp();

        $this->team = create(Team::class);
    }

    /** @test */
    function a_collaborator_can_associate_lessons_to_a_team()
    {
        $this->withoutExceptionHandling()
            ->signIn(['is_collaborator' => true]);

        $this->get(route('dashboard.courses.lessons.create', $this->team))
            ->assertOk();

        $lesson = make(Lesson::class);

        $this->post(route('dashboard.courses.lessons.store', $this->team), $raw = $lesson->toArray());

        $this->assertDatabaseHas($lesson->getTable(), $raw);
    }

    /** @test */
    function a_lesson_cannot_be_created_with_empty_values()
    {
        $this->signIn(['is_collaborator' => true]);

        $values = array_map(function () {
            return null;
        }, raw(Lesson::class));

        $this->post(route('dashboard.courses.lessons.store', $this->team), $values)
            ->assertSessionHasErrors(array_keys($values));
    }

    /** @test */
    function a_lesson_can_be_updated_by_collaborators()
    {
        $this->withoutExceptionHandling()
            ->signIn(['is_collaborator' => true]);

        $lesson = create(Lesson::class, ['team_id' => $this->team->id]);
        $updatedLesson = make(Lesson::class);

        $this->get(route('dashboard.courses.lessons.edit', [$this->team, $lesson]))
            ->assertOk();

        $this->patch(route('dashboard.courses.lessons.update', [$this->team, $lesson]),
            $updatedLesson->toArray()
        );

        $this->assertDatabaseHas($lesson->getTable(), $updatedLesson->toArray());
    }

    /** @test */
    function a_lesson_cannot_be_updated_with_empty_values()
    {
        $this->signIn(['is_collaborator' => true]);

        $lesson = create(Lesson::class, ['team_id' => $this->team->id]);

        $values = array_map(function () {
            return null;
        }, raw(Lesson::class));

        $this->patch(route('dashboard.courses.lessons.update', [$this->team, $lesson]), $values)
            ->assertSessionHasErrors(array_keys($values));
    }

    /** @test */
    function a_lesson_can_be_deleted()
    {
        $this->signIn(['is_collaborator' => true]);

        $lesson = create(Lesson::class, ['team_id' => $this->team->id]);

        $this->delete(route('dashboard.courses.lessons.destroy', [$this->team, $lesson]));

        $this->assertDatabaseMissing($lesson->getTable(), $lesson->toArray());
    }

    /** @test */
    function a_collaborator_can_view_all_lessons_that_are_associated_with_a_team()
    {
        $this->signIn(['is_collaborator' => true]);

        $lesson = create(Lesson::class, ['team_id' => $this->team->id]);

        $this->get(route('dashboard.courses.lessons.index', $this->team))
            ->assertSee($lesson->date->format('d/m/Y'));
    }

    /** @test */
    function a_collaborator_can_view_a_single_lesson()
    {
        $this->signIn(['is_collaborator' => true]);

        $lesson = create(Lesson::class, ['team_id' => $this->team->id]);

        $this->get(route('dashboard.courses.lessons.show', [$this->team, $lesson]))
            ->assertSee($lesson->date->format('d/m/Y'))
            ->assertSee($lesson->start_time)
            ->assertSee($lesson->end_time);
    }
}
