<?php

namespace Database\Seeders;

use App\Models\TypeUnite;
use App\Models\Pay;
use App\Models\Localite;
use Illuminate\Database\Seeder;
use App\Models\AireProtegee;
use Illuminate\Support\Str;
use Faker\Factory;


class AireTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function randomMap($length=17){
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $string = '';
        for($i=0; $i<$length; $i++){
            $string .= $chars[rand(0, strlen($chars)-1)];
        }
        return $string;
    }
    public function run()
    {



        $faker=Factory::create();
        $pays=Pay::all();
        $aires = [
            '',
            
        ];
        $localites=Localite::all();
        //Unite::truncate();
        foreach($localites as $localite){
            $aires = AireProtegee::create([
                'libelle'                        =>$faker->streetName,
                'prenom_responsable'             =>$faker->lastName,
                'nom_responsable'                =>$faker->firstName,
                'tel'                            =>$faker->phoneNumber,
                'adresse'                        =>$faker->streetAddress,
                'code_wdpa_aire'                 =>$localite->id,
                'pays_id'                        =>rand(1,$pays->count()),
                'map'                            =>'<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d62364.500693734335!2d-1.4831394!3d12.3305024!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x3e9e5c9e560b2f73!2sSwitch%20Maker!5e0!3m2!1sfr!2sbf!4v1607353006053!5m2!1sfr!2sbf" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>',
                'logo'                           =>"/images/pngs/bg-l.png",
                'image_couverture'               =>"/images/pngs/bg-l.png",
                'uuid'                           =>Str::uuid()
            ]);
        }
    }
}
