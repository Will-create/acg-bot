<?php

namespace Database\Seeders;

use App\Models\AireProtegee;
use Faker\Factory;
use App\Models\Pay;
use App\Models\User;
use App\Models\Crime;
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
    private $faker=Factory::create();
    private $pays=Pay::all();
    private $users=User::all();
    private $especes = Espece::all();
    private $localites=Localite::all();
    private $unites = Unite::all();
    private $tcrime = TypeCrime::all();
    private $aires = AireProtegee::all();
    private $conditions = ['frais', 'vivant'];

    
    private function crimes(){
        Crime::create([
            'uuid' => Str::uuid(),
            'condition_produit_id' => rand(1,count($this->conditions)),
            'type_crime_id' => rand(1,count($this->tcrime)),
            'espece_id' => rand(1,count($this->especes)),
            'pays_apprehension' => rand(1,count($this->pays)),
            'pays_destination' => rand(1,count($this->pays)),
            'pays_origine_produit' => rand(1,count($this->pays)),
            'services_investigateurs' => rand(1,count($this->unites)),
            'date_apprehension' => $this->faker->date(),
            'date_abattage' => $this->faker->date(),
            'localite_apprehension' => rand(1,count($this->localites)),
            'longitude' => $this->faker->longitude(-6,12),
            'latitude' => $this->faker->latitude(-6,12),
            'gestion_des_saisies' => rand(1,count($this->unites)),
            'veto' => $this->faker->boolean(),
            'lien_terrorisme' => $this->faker->boolean(),
            'victime' => $this->faker->firstName.' '.$this->faker->lastName,
            'aire_protegee_id' => rand(1,count($this->aires)),
        ]);
    }
    public function run()
    {
        for ($i=0; $i <15; $i++) { 
            $this->crimes();
        }
    }
}


