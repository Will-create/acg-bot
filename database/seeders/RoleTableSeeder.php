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
        //Role::truncate();
        Role::create([
            'uuid'          => Str::uuid(),
            'designation'   => 'Administrateur Général',
            'description'   => 'Le lorem ipsum est, en imprimerie, une suite de mots sans signification  utilisée à titre provisoire pour calibrer une mise en page, le texte définitif ve'
        ]);
        Role::create([
            'uuid'          => Str::uuid(),
            'designation'   => 'Agent d’une Unité',
            'description'   => 'Le lorem ipsum est, en imprimerie, une suite de mots sans signification
                                utilisée à titre provisoire pour calibrer
                                une mise en page, le texte définitif venant


                                '
        ]);
        Role::create([
            'uuid'          => Str::uuid(),
            'designation'   => 'Coordonnateur Régional',
            'description'   => 'Le lorem ipsum est, en imprimerie, une suite de mots sans signification
                                utilisée à titre provisoire pour calibrer
                                une mise en page, le texte définitif venant


                                '
        ]);
        Role::create([
            'uuid'          => Str::uuid(),
            'designation'   => 'Coordonnateur National',
            'description'   => 'Le lorem ipsum est, en imprimerie,  une suite de mots sans signification
                                utilisée à titre provisoire pour calibrer
                                une mise en page, le texte définitif venant


                                '
        ]);
        Role::create([
            'uuid'          => Str::uuid(),
            'designation'   => 'Chef d’Unité',
            'description'   => 'Le lorem ipsum est, en imprimerie, une suite de mots sans signification
                                utilisée à titre provisoire pour calibrer
                                une mise en page, le texte définitif venant


                                '
        ]);

    }
}
