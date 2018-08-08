<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegisterCollaboratorsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function an_administrator_can_register_a_collaborator()
    {
        $this->withoutExceptionHandling()
             ->asAdmin();

        $this->get(route('dashboard.collaborators.create'))
             ->assertOk();

        $data = $this->rawUser(true);

        $this->post(route('dashboard.collaborators.store'), $data);

        $this->assertDatabaseHas(
            'users',
            array_except($data, ['password_confirmation', 'password']) + ['is_collaborator' => true]
        );
    }

    /** @test */
    function a_normal_collaborator_cannot_register_collaborators()
    {
        $this->signIn(['is_collaborator' => true]);

        $this->get(route('dashboard.collaborators.create'))
             ->assertForbidden();

        $this->post(route('dashboard.collaborators.store'), [])
             ->assertForbidden();
    }

    /** @test */
    function a_normal_user_cannot_register_collaborators()
    {
        $this->signIn();

        $this->get(route('dashboard.collaborators.create'))
            ->assertForbidden();

        $this->post(route('dashboard.collaborators.store'), [])
            ->assertForbidden();
    }

    /** @test */
    function a_guest_cannot_register_collaborators()
    {
        $this->get(route('dashboard.collaborators.create'))
            ->assertRedirect(route('login'));

        $this->post(route('dashboard.collaborators.store'), [])
            ->assertRedirect(route('login'));
    }

    /** @test */
    function a_collaborator_cannot_be_registered_with_empty_values()
    {
        $this->asAdmin();

        $this->post(route('dashboard.collaborators.store'), $data = $this->emptyValues())
            ->assertSessionHasErrors(array_keys($data));
    }

    /** @test */
    function a_collaborator_cannot_be_registered_with_an_invalid_email()
    {
        $this->asAdmin();

        $user = $this->rawUser();
        $user['email'] = 'invalid-email';

        $this->post(route('dashboard.collaborators.store'), $user)
            ->assertSessionHasErrors('email');
    }

    /** @test */
    function the_password_must_have_at_least_six_characters()
    {
        $this->asAdmin();

        $user = $this->rawUser();
        $user['password'] = 'pedro';

        $this->post(route('dashboard.collaborators.store'), $user)
            ->assertSessionHasErrors('password');
    }

    /** @test */
    function the_password_must_be_confirmed()
    {
        $this->asAdmin();

        $user = $this->rawUser(true);
        unset($user['password_confirmation']);

        $this->post(route('dashboard.collaborators.store'), $user)
            ->assertSessionHasErrors('password');
    }

    /** @test */
    function the_user_must_be_redirected_after_the_registration()
    {
        $this->asAdmin();

        $this->post(route('dashboard.collaborators.store'), $this->rawUser(true))
            ->assertRedirect();
    }

    /** @test */
    function the_session_must_have_a_flash_message_indicating_that_the_operation_was_successfully_accomplished()
    {
        $this->asAdmin();

        $this->post(route('dashboard.collaborators.store'), $this->rawUser(true))
            ->assertSessionHas('flash');
    }

    protected function emptyValues()
    {
        return array_map(function () {
            return ' ';
        }, $this->rawUser());
    }

    protected function rawUser($withPasswordConfirmation = false)
    {
        $user = raw(User::class);
        unset($user['remember_token'], $user['cpf_cnpj'], $user['gender'], $user['birth_date']);

        if ($withPasswordConfirmation) {
            $user['password_confirmation'] = $user['password'];
        }

        return $user;
    }
}
