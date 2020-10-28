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

        Role::create([
            'uuid'          => Str::uuid(),
            'designation'   => 'Administrateur Général'
        ]);
        Role::create([
            'uuid'          => Str::uuid(),
            'designation'   => 'Agent d’une Unité'
        ]);
        Role::create([
            'uuid'          => Str::uuid(),
            'designation'   => 'Coordonnateur Régional'
        ]);
        Role::create([
            'uuid'          => Str::uuid(),
            'designation'   => 'Coordonnateur National'
        ]);
        Role::create([
            'uuid'          => Str::uuid(),
            'designation'   => 'Chef d’Unité'
        ]);

    }
}
