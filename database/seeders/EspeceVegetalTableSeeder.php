<?php

namespace Database\Seeders;

use App\Models\Espece;
use App\Models\Ordre;
use Illuminate\Database\Seeder;
use Faker\Factory;
use Illuminate\Support\Str;
class EspeceVegetalTableSeeder extends Seeder
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
        for ($i=0; $i <10 ; $i++) {
            Espece::create([
                'nom'                   => $faker->plant,
                'uuid'                  => Str::uuid(),
                'photo'                 =>$faker->file($sourceDir = '/home/louisbertson/Desktop/criminalite/public/storage/espece_vegetal', $targetDir = '/home/louisbertson/Desktop/criminalite/public/storage/images', false),
                'famille'               => $faker->company,
                'regne'                 =>'végétal',
                'nom_scientifique'      => $faker->catchPhrase,
                'ordre_id'              => Ordre::first()->id
            ]);
        }
    }
   
}
