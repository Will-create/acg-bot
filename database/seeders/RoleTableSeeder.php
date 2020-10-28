<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = ['Agent d’une Unité', 'Chef d’Unité', 'Coordonnateur National', 'Coordonnateur Régional', 'Administrateur Général'];
        foreach ($roles as  $role) {
            Role::create([
                'uuid'          => Str::uuid(),
                'designation'   => $role
            ]);
        }

    }
}
