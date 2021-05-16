<?php

namespace Database\Seeders;

use App\Models\Api;
use App\Models\Sms;
use Faker\Factory;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;


class SmsTableSeeder extends Seeder
{
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $apis = Api::all();
        $faker = Factory::create();
        foreach($apis as $api){
            for ($i=0; $i < 3; $i++) { 
                $sms = Sms::create([
                    'uuid'                   =>Str::uuid(),
                    'contenu_entree'         => $faker->text(600),
                ]);
            }
        }

    }
}
