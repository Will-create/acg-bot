<?php

namespace Database\Seeders;

use App\Models\Espece;
use App\Models\Ordre;
use Illuminate\Database\Seeder;
use Faker\Factory;
use Illuminate\Support\Str;
class EspeceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        \Bezhanov\Faker\ProviderCollectionHelper::addAllProvidersTo($faker);
        $faker->addProvider(new \Bezhanov\Faker\Provider\Species($faker));

        $regnes = ['animal','vegetal'];
        for ($i=0; $i <20 ; $i++) {
            Espece::create([
                'nom'                   => $faker->creature,
                'uuid'                  => Str::uuid(),
                'photo'                 => "/images/pngs/bg-l.png",
                'famille'               => $faker->text($maxNbChars = 25),
                'regne'                  =>$regnes[rand(0,1)],
                'nom_scientifique'      => $faker->text($maxNbChars = 50),
                'ordre_id'              => Ordre::first()->id
            ]);
        }
    }
}
