<?php

namespace Tests\Feature;

use App\Lesson;
use App\Team;
use Carbon\Carbon;
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

    /** @test */
    function multiple_lessons_can_be_created_given_a_date_range()
    {
        $this->withoutExceptionHandling();
        $this->signIn(['is_collaborator' => true]);

        $team = create(Team::class);

        $this->post(route('dashboard.courses.schedules.store', $team), [
            'week_days' => [3, 5],
            'first_day' => '22/08/2018',
            'last_day' => '07/09/2018',
            'start_time' => '17:30:00',
            'end_time' => '19:30:00',
        ]);

        $lessons = $team->lessons()->orderBy('date')->get();

        $this->assertCount(6, $lessons);
        $this->assertStringStartsWith('2018-08-22', $lessons[0]->date);
        $this->assertStringStartsWith('2018-08-24', $lessons[1]->date);
        $this->assertStringStartsWith('2018-08-29', $lessons[2]->date);
        $this->assertStringStartsWith('2018-08-31', $lessons[3]->date);
        $this->assertStringStartsWith('2018-09-05', $lessons[4]->date);
        $this->assertStringStartsWith('2018-09-07', $lessons[5]->date);
    }

    /** @test */
    function a_schedule_of_lessons_cannot_be_created_with_empty_values()
    {
        $this->signIn(['is_collaborator' => true]);

        $team = create(Team::class);

        $this->post(route('dashboard.courses.schedules.store', $team), $data = [
            'week_days' => null,
            'first_day' => null,
            'last_day' => null,
            'start_time' => null,
            'end_time' => null,
        ])->assertSessionHasErrors(array_keys($data));
    }
}
