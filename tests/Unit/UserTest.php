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
    function it_knows_if_it_is_an_admin()
    {
        $user = create(User::class, ['is_admin' => false]);
        $this->assertFalse($user->isAdmin());

        $user = create(User::class, ['is_admin' => true]);
        $this->assertTrue($user->isAdmin());
    }
}
