<?php

namespace Tests\Unit;

use App\Role;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function it_knows_if_it_is_a_collaborator()
    {
        $user = create(User::class, ['is_collaborator' => false]);
        $this->assertFalse($user->isCollaborator());

        $user = create(User::class, ['is_collaborator' => true]);
        $this->assertTrue($user->isCollaborator());
    }

    /** @test */
    function a_collaborator_may_have_roles()
    {
        create(Role::class, ['name' => 'admin']);
        $user = create(User::class, ['is_collaborator' => true]);

        $this->assertCount(0, $user->roles);

        $user->addRole('admin');

        $user = $user->fresh();

        $this->assertCount(1, $user->roles);
        $this->assertSame('admin', $user->roles[0]->name);
    }

    /** @test */
    function a_collaborator_knows_if_it_has_an_specific_role()
    {
        create(Role::class, ['name' => 'admin']);
        $user = create(User::class, ['is_collaborator' => true]);

        $this->assertFalse($user->hasRole('admin'));

        $user->addRole('admin');

        $this->assertTrue($user->hasRole('admin'));
    }
}
