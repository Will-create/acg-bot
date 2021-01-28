<?php

namespace Database\Seeders;

use App\Models\AireProtegee;
use Faker\Factory;
use App\Models\Pay;
use App\Models\User;
use App\Models\Crime;
use App\Models\CrimeAuteur;
use App\Models\CrimeEspece;
use App\Models\Espece;
use App\Models\Localite;
use App\Models\TypeCrime;
use App\Models\TypeUnite;
use App\Models\Unite;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class CrimeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        $pays = Pay::all();
        $users = User::all();
        $especes = Espece::all();
        $localites = Localite::all();
        $unites = Unite::all();
        $tcrime = TypeCrime::all();
        $aires = AireProtegee::all();
        $conditions = ['frais', 'vivant'];
        for ($i = 0; $i < 30; $i++) {
            $crime =  Crime::create([
                'uuid' => Str::uuid(),
                // 'condition_produit_id' => rand(1,count($conditions)),
                'type_crime_id' => rand(1, count($tcrime)),
                'espece_id' => rand(1, count($especes)),
                'pays_apprehension' => rand(1, count($pays)),
                'pays_destination' => rand(1, count($pays)),
                'pays_origine_produit' => rand(1, count($pays)),
                'services_investigateurs' => rand(1, count($unites)),
                'date_apprehension' => $faker->dateTimeBetween('-12 years', 'now'),
                'date_abattage' => $faker->date(),
                'localite_apprehension' => rand(1, count($localites)),
                'longitude' => $faker->longitude(-6, 12),
                'latitude' => $faker->latitude(-6, 12),
                'gestion_des_saisies' => rand(1, count($unites)),
                'veto' => $faker->boolean(),
                'lien_terrorisme' => $faker->boolean(),
                'victime' => $faker->firstName . ' ' . $faker->lastName,
                'aire_protegee_id' => rand(1, count($aires)),
            ]);
        }
        
    }
}
