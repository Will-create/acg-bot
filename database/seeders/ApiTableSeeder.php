<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Api;
use App\Models\Menu;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class ApiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sousmenus = Menu::where('type_menu_id',2)->get();

        $listes = [
            [
                'nom' => 'Curent weather and forecast',
            ],
        ];
        $faker=Factory::create();
        for ($i=0; $i < 2; $i++) { 
            $api = Api::create([
                'nom'                  => 'Api'.$i,
                'uuid'                 => Str::uuid(),
                'fournisseur'          => $faker->company,
                'url'                  => $faker->url,
                'url_envoie'           => $faker->url,
                'description'          => 'Le lorem ipsum est, en imprimerie, une suite de mots sans signification
                                                utilisée à titre provisoire pour calibrer
                                                une mise en page, le texte définitif venant'
            ]);
        }
    }
}