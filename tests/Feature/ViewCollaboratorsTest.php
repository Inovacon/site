<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ViewCollaboratorsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function an_administrator_can_view_all_collaborators()
    {
        $this->withoutExceptionHandling()
             ->asAdmin();

        $collaborator = $this->createCollaborator();

        $this->get(route('dashboard.collaborators.index'))
             ->assertSee($collaborator->name);
    }

    /** @test */
    function a_normal_collaborator_cannot_view_all_collaborators()
    {
        $this->signIn(['is_collaborator' => true]);

        $this->get(route('dashboard.collaborators.index'))
            ->assertForbidden();
    }

    /** @test */
    function a_normal_user_cannot_view_all_collaborators()
    {
        $this->signIn(['is_collaborator' => false]);

        $this->get(route('dashboard.collaborators.index'))
            ->assertForbidden();
    }

    /** @test */
    function a_guest_cannot_even_think_about_viewing_all_collaborators()
    {
        $this->get(route('dashboard.collaborators.index'))
            ->assertRedirect(route('login'));
    }

    protected function createCollaborator()
    {
        $data = raw(User::class);
        unset($data['remember_token'], $data['cpf_cnpj'], $data['gender'], $data['birth_date']);

        return User::createCollaborator($data);
    }
}
