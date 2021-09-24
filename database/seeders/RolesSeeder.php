<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
                'name' => 'admin',
                'guard_name' => 'web',
            ]
        );

        Role::create([
                'name' => 'tu',
                'guard_name' => 'web',
            ]
        );

        Role::create([
                'name' => 'ketua',
                'guard_name' => 'web',
            ]
        );

        Role::create([
                'name' => 'wr',
                'guard_name' => 'web',
            ]
        );

        Role::create([
                'name' => 'inventaris',
                'guard_name' => 'web',
            ]
        );

        Role::create([
                'name' => 'pplp',
                'guard_name' => 'web',
            ]
        );
    }
}
