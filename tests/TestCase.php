<?php

namespace Tests;

use App\Role;
use App\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function signIn($overrides = [])
    {
        $this->be(factory(User::class)->create($overrides));

        return $this;
    }

    public function asAdmin()
    {
        create(Role::class, ['name' => 'admin']);
        $user = factory(User::class)->create(['is_collaborator' => true]);
        $user->attachRole('admin');

        $this->be($user);

        return $this;
    }
}
