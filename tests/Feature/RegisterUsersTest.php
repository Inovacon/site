<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegisterUsersTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function an_administrator_can_register_a_collaborator()
    {
        $this->withoutExceptionHandling()
             ->asAdmin();

        $this->get(route('dashboard.collaborators.create'))
             ->assertOk();

        $data = raw(User::class);

        $this->post(route('dashboard.collaborators.store'), $data);

        $this->assertDatabaseHas(
            'users',
            $data + ['is_collaborator' => true]
        );
    }
}
