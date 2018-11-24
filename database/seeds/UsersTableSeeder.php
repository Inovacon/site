<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class)->create([
            'email' => 'root@example.com',
            'password' => '123456',
            'is_collaborator' => true,
            'is_root' => true
        ])->attachRole('admin');
    }
}
