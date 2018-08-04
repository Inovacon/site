<?php

namespace Tests\Unit;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
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
}
