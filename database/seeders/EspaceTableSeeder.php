<?php

namespace Database\Seeders;

use App\Models\Espece;
use App\Models\Ordre;
use Illuminate\Database\Seeder;
use Faker\Factory;
use Illuminate\Support\Str;
class EspaceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        $types = ['espece animale','espece vegetale'];
        for ($i=0; $i <20 ; $i++) {
            Espece::create([
                'nom'                   => $faker->text($maxNbChars = 25),
                'uuid'                  => Str::uuid(),
                'photo'                 => "/images/pngs/bg-l.png",
                'famille'               => $faker->text($maxNbChars = 25),
                'type'                  =>$types[rand(0,1)],
                'nom_scientifique'      => $faker->text($maxNbChars = 50),
                'ordre_id'              => Ordre::first()->id
            ]);
        }
    }
}
