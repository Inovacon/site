<?php

namespace Tests;

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

    protected function asAdmin($overrides = [])
    {
        $user = factory(User::class)->create(
            array_merge(['is_admin' => true], $overrides)
        );

        $this->be($user);

        return $this;
    }
}
