<?php

namespace Database\Seeders;
use App\Models\TypeCrime;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TypeCrimeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $typeCrimes=[
            'Trafics  illégaux des espèces sauvages',
            'Traconnage',
            'pêche illégale',
            'pâturage illégal',
            'coupe de bois/exploitation forestière illégale',
            'empiètement agricole',
            'exploitation illégale des Produits forestiers non ligneux',
            'exploitation minière illégale',
            'exploitation illégale de sable',
            'pollution des eaux',
            'empiètement illégal sur les espaces côtiers et maritimes',
            'abattage, l’ébranchage, l’arrachage et la mutilation des essences forestières protégées',
            'abattage, l’ébranchage, l’arrachage et la mutilation des arbres dans une AP',
            'carbonisation illégale',
            'intrusion/circulation illégale dans une AP',
            'commerce illégale de bois',
            'Circulation illégale de bois',
            'Installation illégale d’industrie forestière',
            'défrichement de bois et broussaille dans une aire protégée',
            'défrichement ou occupation illégale des berges des cours d’eau',
            'incendie de feu de brousse incontrôlé ou tardif',
            'divagation des animaux domestique dans les AP',
            'obstacle à l\'agent dans à l’accomplissement',
            'détention  illégale d’espèces ou de produits d’ espèces sauvage'
        ];

        foreach($typeCrimes as $tc){
           TypeCrime::create([
               'uuid'=>Str::uuid(),
               'nom'=>$tc,
               'description'   => 'Le lorem ipsum est, en imprimerie,  une suite de mots sans signification 
                                utilisée à titre provisoire pour calibrer 
                                une mise en page, le texte définitif venant
                                '
           ]);
        }
    }
}
