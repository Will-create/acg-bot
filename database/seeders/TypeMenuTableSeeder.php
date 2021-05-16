<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TypeMenu;
use Illuminate\Support\Str;
class TypeMenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types=['Rubrique','Application'];
        //Type::truncate();
        foreach($types as $type){
         TypeMenu::create([
             'nom'=>$type,
             'uuid'=>Str::uuid(),
             'description'   => 'Le lorem ipsum est, en imprimerie, une suite de mots sans signification
                                utilisée à titre provisoire pour calibrer
                                une mise en page, le texte définitif venant
                                '
             ]);

        }
    }
}
