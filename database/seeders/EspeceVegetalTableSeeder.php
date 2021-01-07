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
        for ($i=0; $i <0 ; $i++) {
            Espece::create([
                'nom'                   => $faker->bird,
                'uuid'                  => Str::uuid(),
                'photo'                 => $faker->file($sourceDir = 'D:\Switch Maker\criminalite\public\espece_animal', $targetDir = 'storage\app\public\espece_uploads', false),
                'famille'               => $faker->bird,
                'regne'                 => 'animal',
                'nom_scientifique'      => $faker->bird,
                'ordre_id'              => Ordre::inRandomOrder()->first()->id
            ]);
        }
        for ($i=0; $i <10 ; $i++) {
            Espece::create([
                'nom'                   => $faker->name,
                'uuid'                  => Str::uuid(),
                'photo'                 => 'espece_uploads/'.$faker->file($sourceDir = 'D:\Switch Maker\criminalite\public\espece_vegetal', $targetDir = 'storage\app\public\espece_uploads', false),
                'famille'               => $faker->name,
                'regne'                 =>'végétal',
                'nom_scientifique'      => $faker->name,
                'ordre_id'              => Ordre::inRandomOrder()->first()->id
            ]);
        }


    }

}
