<?php

namespace Database\Seeders;

use App\Models\Arme;
use Illuminate\Database\Seeder;
use Faker\Factory;
use Illuminate\Support\Str;
class ArmeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        for ($i=0; $i <10 ; $i++) {
            Arme::create([
                'libelle'               => $faker->name,
                'uuid'                  => Str::uuid(),
                'photo'                 => 'images/'.$faker->file($sourceDir = 'public/chasse', $targetDir = 'storage/app/public/images', false),
                'reference'             => $faker->name,
                'remarques'             => $faker->text,
                'crime_id'              => random_int(0,15),
            ]);
        }
    }

}
