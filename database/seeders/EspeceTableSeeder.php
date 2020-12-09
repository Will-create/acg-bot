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
        for ($i=0; $i <0 ; $i++) {
            Espece::create([
                'nom'                   => $faker->jobTitle,
                'uuid'                  => Str::uuid(),
                'photo'                 =>$faker->file($sourceDir = '/home/louisbertson/Desktop/criminalite/public/storage/espece_animal', $targetDir = '/home/louisbertson/Desktop/criminalite/public/storage/images', false),
                'famille'               => $faker->company,
                'regne'                 =>$faker->randomElement($array = array ('animal','végétal')),
                'nom_scientifique'      => $faker->catchPhrase,
                'ordre_id'              => Ordre::first()->id
            ]);
        }
    }
   
}
