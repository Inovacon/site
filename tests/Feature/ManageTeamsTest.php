<?php

namespace Tests\Feature;

use App\Team;
use App\Course;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ManageTeamsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function a_collaborator_can_associate_teams_to_an_existing_course()
    {
        $this->withoutExceptionHandling()
            ->signIn(['is_collaborator' => true]);

        $course = create(Course::class);

        $this->get(route('dashboard.courses.teams.create', $course))
            ->assertOk();

        $team = make(Team::class);
        $teamData = $team->toArray();
        unset($teamData['course_id']);

        $this->post(route('dashboard.courses.teams.store', $course), $teamData);

        $this->assertDatabaseHas($team->getTable(), $teamData + ['course_id' => $course->id]);
    }

    /** @test */
    function unauthorized_users_may_not_create_teams()
    {
        $course = create(Course::class);

        $this->get(route('dashboard.courses.teams.create', $course))
            ->assertRedirect(route('login'));

        $this->post(route('dashboard.courses.teams.store', $course))
            ->assertRedirect(route('login'));

        $this->signIn(['is_collaborator' => false]);

        $this->get(route('dashboard.courses.teams.create', $course))
            ->assertForbidden();

        $this->post(route('dashboard.courses.teams.store', $course))
            ->assertForbidden();
    }

    /** @test */
    function a_collaborator_can_read_all_teams_that_are_associated_with_a_course()
    {
        $this->withoutExceptionHandling()
            ->signIn(['is_collaborator' => true]);

        $course = create(Course::class);
        $team = create(Team::class, ['course_id' => $course->id]);

        $this->get(route('dashboard.courses.teams.index', $course))
            ->assertSee('Turma '.$team->id);
    }

    /** @test */
    function a_collaborator_can_view_a_single_team()
    {
        $this->withoutExceptionHandling()
            ->signIn(['is_collaborator' => true]);

        $course = create(Course::class);
        $team = create(Team::class, ['course_id' => $course->id]);

        $this->get(route('dashboard.courses.teams.show', [$course, $team]))
            ->assertSee($team->minimum_students)
            ->assertSee($team->maximum_students);
    }

    /** @test */
    function a_team_requires_a_minimum_and_a_maximum_number_of_students()
    {
        $this->signIn(['is_collaborator' => true]);

        $c = create(Course::class);

        $this->post(route('dashboard.courses.teams.store', $c), [
            'minimum_students' => null,
        ])->assertSessionHasErrors('minimum_students');

        $this->post(route('dashboard.courses.teams.store', $c), [
            'maximum_students' => null,
        ])->assertSessionHasErrors('maximum_students');
    }

    /** @test */
    function more_than_one_team_can_be_created_at_once()
    {
        $this->signIn(['is_collaborator' => true]);

        $c = create(Course::class);

        $team = make(Team::class, ['course_id' => $c->id]);

        $this->post(route('dashboard.courses.teams.store', $c),
            $team->toArray() + ['times' => 3]
        );

        $this->assertDatabaseHas($team->getTable(), $team->toArray());
        $this->assertEquals(3, Team::count());
    }
}
