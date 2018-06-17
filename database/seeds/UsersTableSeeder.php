<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // This will be member and his email will be member@example.com and his password will be temp123
        factory(User::class)->create([
            'email' => 'member@example.com',
            'password' => bcrypt('temp123'),
        ]);
        // Now we need to create admin user, his email will be admin@example.com and will have same password as user
        factory(User::class)->create([
            'email' => 'admin@example.com',
            'password' => bcrypt('temp123'),
            'role' => 'admin',
        ]);
    }
}
