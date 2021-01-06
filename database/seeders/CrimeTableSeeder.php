<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Crime;
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
        $crimes =  function(){
            Crime::create([
                'uuid' => Str::uuid()
            ]);
        };

        for ($i=0; $i <15; $i++) { 
            $crimes();
        }
    }
}

