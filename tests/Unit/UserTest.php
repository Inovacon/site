<?php

namespace Tests\Unit;

use App\Role;
use App\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Hash;
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

        $user->attachRole('admin');

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

        $user->attachRole('admin');

        $this->assertTrue($user->hasRole('admin'));
    }

    /** @test */
    function a_collaborator_knows_if_it_has_any_of_the_specified_roles()
    {
        create(Role::class, ['name' => 'admin']);
        create(Role::class, ['name' => 'boss']);

        $user = create(User::class, ['is_collaborator' => true]);

        $this->assertFalse($user->hasAnyRole(['admin', 'boss']));

        $user->attachRole('boss');

        $this->assertTrue($user->hasAnyRole(['admin', 'boss']));

        $user->attachRole('admin');

        $this->assertTrue($user->hasAnyRole('admin', 'boss'));
    }

    /** @test */
    function it_knows_if_it_is_an_admin()
    {
        create(Role::class, ['name' => 'admin']);
        $user = create(User::class, ['is_collaborator' => true]);

        $user->attachRole('admin');

        $this->assertTrue($user->isAdmin());
    }

    /** @test */
    function it_can_create_a_collaborator()
    {
        $data = raw(User::class);
        unset($data['is_collaborator']);

        $user = User::createCollaborator($data);

        $this->assertTrue($user->isCollaborator());
        $this->assertDatabaseHas(
            $user->getTable(),
            ['id' => $user->id, 'is_collaborator' => true]
        );
    }

    /** @test */
    function it_makes_the_password_hash_when_the_password_is_set()
    {
        $password = '123456';

        $user = make(User::class, ['password' => $password]);

        $this->assertNotSame($password, $user->password);
        $this->assertTrue(Hash::check($password, $user->password));
    }

    /** @test */
    function it_do_not_stores_the_password_in_clear_text()
    {
        $user = create(User::class, ['password' => '123456']);

        $this->assertDatabaseMissing($user->getTable(), ['password' => '123456']);
    }

    /** @test */
    function it_can_fetch_only_collaborators()
    {
        $this->assertInstanceOf(Builder::class, User::collaborator());

        create(User::class, ['is_collaborator' => false]);

        $this->assertCount(0, User::collaborator()->get());

        create(User::class, ['is_collaborator' => true]);

        $this->assertCount(1, User::collaborator()->get());
    }
}
