<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Role::create([
            'role' => 'user',
        ]);
        Role::create([
            'role' => 'vendor',
        ]);

        Role::create([
            'role' => 'Ceo',
        ]);
        Role::create([
            'role' => 'Finance',
        ]);
        Role::create([
            'role' => 'Clientmanagent',
        ]);
        Role::create([
            'role' => 'Vendormanagent',
        ]);
    }
}
