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
            'name' => 'tu',
            'email' => 'user@tu.com',
            'password' => bcrypt('user123')
        ]);

        $user->assignRole('tu');

        $user = User::create([
            'name' => 'ketua',
            'email' => 'user@ketua.com',
            'password' => bcrypt('user123')
        ]);

        $user->assignRole('ketua');

        $user = User::create([
            'name' => 'wr',
            'email' => 'user@wr.com',
            'password' => bcrypt('user123')
        ]);

        $user->assignRole('wr');

        $user = User::create([
            'name' => 'inventaris',
            'email' => 'user@inventaris.com',
            'password' => bcrypt('user123')
        ]);

        $user->assignRole('inventaris');

        $user = User::create([
            'name' => 'pplp',
            'email' => 'user@pplp.com',
            'password' => bcrypt('user123')
        ]);

        $user->assignRole('pplp');
    }
}
