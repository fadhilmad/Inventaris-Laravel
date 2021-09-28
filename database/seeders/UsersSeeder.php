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
            'user_id' => '1705102001',
            'jabatan' => 'admin',
            'unit_kerja' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin123')
        ]);

        $admin->assignRole('admin');

        $user = User::create([
            'name' => 'tu',
            'user_id' => '1705102001',
            'jabatan' => 'tu',
            'unit_kerja' => 'tu',
            'email' => 'user@tu.com',
            'password' => bcrypt('user123')
        ]);

        $user->assignRole('tu');

        $user = User::create([
            'name' => 'ketua',
            'user_id' => '1705102001',
            'jabatan' => 'kaprodi',
            'unit_kerja' => 'kaprodi',
            'email' => 'user@ketua.com',
            'password' => bcrypt('user123')
        ]);

        $user->assignRole('ketua');

        $user = User::create([
            'name' => 'wr',
            'user_id' => '1705102001',
            'jabatan' => 'wr',
            'unit_kerja' => 'wr',
            'email' => 'user@wr.com',
            'password' => bcrypt('user123')
        ]);

        $user->assignRole('wr');

        $user = User::create([
            'name' => 'inventaris',
            'user_id' => '1705102001',
            'jabatan' => 'inventaris',
            'unit_kerja' => 'inventaris',
            'email' => 'user@inventaris.com',
            'password' => bcrypt('user123')
        ]);

        $user->assignRole('inventaris');

        $user = User::create([
            'name' => 'pplp',
            'user_id' => '1705102001',
            'jabatan' => 'pplp',
            'unit_kerja' => 'pplp',
            'email' => 'user@pplp.com',
            'password' => bcrypt('user123')
        ]);

        $user->assignRole('pplp');
    }
}
