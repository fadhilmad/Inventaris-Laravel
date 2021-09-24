<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Admin1',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin123')
        ]);

        $admin->assignRole('admin');

        $user = User::create([
            'name' => 'user1',
            'email' => 'user@admin.com',
            'password' => bcrypt('user123')
        ]);

        $user->assignRole('tu');
    }
}
