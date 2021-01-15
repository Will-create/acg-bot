<?php

namespace Database\Seeders;

use App\Models\Arme;
use App\Models\Crime;
use App\Models\CrimeAuteur;
use App\Models\crimeConfiscation;
use App\Models\CrimeEspece;
use App\Models\crimeTypeReglement;
use App\Models\DecisionJustice;
use App\Models\Espece;
use App\Models\ModeReglement;
use App\Models\Pay;
use Illuminate\Database\Seeder;
use Faker\Factory;
use Illuminate\Support\Str;

class CrimeParameter extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        $crimes = Crime::all();
        $travail = ['Eleve', 'medecin', 'Cutivateur', 'Chasseur'];
        $designation = ['Corne', 'Feuille', 'Racine', 'Ecorse'];
        $armes = ['Couteau', 'hache', 'Epé', 'Fusil', 'Pistolet'];
        $condition = ['frais', 'vivant'];
            $genres = ['masculin', 'feminin'];
            $education = [true, false];
            $type = ['auteur', 'complice'];
            $voyage = [true, false];

        foreach ($crimes as $key => $crime) {
           for ($i=0; $i <2 ; $i++) {
            CrimeEspece::create([
                'uuid'  => Str::uuid(),
               'crime_id' => $crime->id,
               'espece_id' => Espece::inRandomOrder()->first()->id
            ]);

            CrimeAuteur::create([
              'nom'                    => $faker->firstName,
              'crime_id'               => $crime->id,
              'uuid'                   => Str::uuid(),
              'prenom'                 => $faker->lastName,
              'adresse'                => substr($faker->text,0,250),
              'type'                   => $type[rand(0, count($type) -1)],
              'date_naiss'             => '1985-4-6',
              'genre'                  => $genres[rand(0, count($genres) -1)],
              'education'              => $education[rand(0, count($education) -1)],
              'voyageur_international'  => $voyage[rand(0, count($voyage) -1)],
              'revenue'                => $faker->numberBetween($min= 100000, $max=10000000),
              'nationalite'            =>  Pay::inrandomOrder()->first()->id,
              'affaire_judiciaire'     => 'Néant',
              'travail'                => $travail[rand(0, count($travail) -1)]
            ]);

            crimeConfiscation::create([
                'uuid'                  =>Str::uuid(),
                'crime_id'              => $crime->id,
                'designation'           => $designation[rand(0, count($designation) -1)],
                'nombre'                =>$faker->numberBetween($min= 5, $max=78),
               'poids'                  =>$faker->numberBetween($min= 5, $max=78),
               'condition'              => $condition[rand(0, count($condition) -1)],
               'description'            => 'Néant'
            ]);

            crimeTypeReglement::create([
                'crime_id'    => $crime->id,
                'mode_id' =>  ModeReglement::inrandomOrder()->first()->id,
                'suite_id' =>  DecisionJustice::inrandomOrder()->first()->id,
                'auteur_id' => CrimeAuteur::where('crime_id', $crime->id)->inrandomOrder()->first()->id,
                'amende' => $faker->numberBetween($min= 100000, $max=10000000),
            ]);

            Arme::create([
                'uuid'    => Str::uuid(),
                'libelle' =>  $armes[rand(0, count($armes) -1)],
                'reference' =>  $faker->numberBetween($min= 100000, $max=10000000),
                'remarques' =>  'Pas de remarque',
                'crime_id' =>    $crime->id,
                'origine' =>     'Arme empruntée'
            ]);
           }
        }
    }
}
