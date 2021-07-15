<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Validation;
use Illuminate\Support\Str;

class ValidationMessage extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    private $validations = [
            "Ceci vient de vore operateur telecel la mtéo à prévu une trèes forte pluie avec des vent très violent merci de vous protéger en cas de pluie"
    ];
    public function run()
    {
        $messages = Validation::all();
        $utilisateurs = User::all();

        for ($i=0; $i <5; $i++) { 
            for( $j=0; $j<count($this->validations);$j++){
                Validation::create([
                    'uuid'   => Str::uuid(),
                    'par' => rand(1,count($utilisateurs)),
                    'message_arriver' => $this->validations[$j],
                ]);       
            }
        }
    }


    // public function run(){
    //     Validation::create([
    //         'uuid'          => Str::uuid(),
    //         'message_arriver'   => 'Le lorem ipsum est, en imprimerie, une suite de mots sans signification
    //                             utilisée à titre provisoire pour calibrer
    //                             une mise en page, le texte définitif venant
    //                             '
    //     ]);
    // }
}
