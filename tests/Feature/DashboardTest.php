<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DashboardTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function a_collaborator_can_access_the_dashboard()
    {
        $this->signIn(['is_collaborator' => true])
             ->get(route('dashboard.index'))
             ->assertOk();
    }

    /** @test */
    function a_guest_cannot_access_the_dashboard()
    {
        $this->get(route('dashboard.index'))
             ->assertRedirect(route('login'));
    }

    /** @test */
    function a_normal_user_cannot_access_the_dashboard()
    {
        $this->signIn(['is_collaborator' => false])
             ->get(route('dashboard.index'))
             ->assertForbidden();
    }
}
