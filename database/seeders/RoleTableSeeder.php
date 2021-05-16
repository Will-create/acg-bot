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
        Role::create([
            'uuid'          => Str::uuid(),
            'designation'   => 'Administrateur Général',
            'description'   => 'Le lorem ipsum est, en imprimerie, une suite de mots sans signification  utilisée à titre provisoire pour calibrer une mise en page, le texte définitif ve'
        ]);
        Role::create([
            'uuid'          => Str::uuid(),
            'designation'   => 'Commercial',
            'description'   => 'Le lorem ipsum est, en imprimerie, une suite de mots sans signification
                                utilisée à titre provisoire pour calibrer
                                une mise en page, le texte définitif venant
                                '
        ]);
        Role::create([
            'uuid'          => Str::uuid(),
            'designation'   => 'Informaticien',
            'description'   => 'Le lorem ipsum est, en imprimerie, une suite de mots sans signification
                                utilisée à titre provisoire pour calibrer
                                une mise en page, le texte définitif venant


                                '
        ]);
        Role::create([
            'uuid'          => Str::uuid(),
            'designation'   => 'Sécrétaire',
            'description'   => 'Le lorem ipsum est, en imprimerie,  une suite de mots sans signification
                                utilisée à titre provisoire pour calibrer
                                une mise en page, le texte définitif venant


                                '
        ]);
        Role::create([
            'uuid'          => Str::uuid(),
            'designation'   => 'Comptable',
            'description'   => 'Le lorem ipsum est, en imprimerie, une suite de mots sans signification
                                utilisée à titre provisoire pour calibrer
                                une mise en page, le texte définitif venant
                                '
        ]);

    }
}
