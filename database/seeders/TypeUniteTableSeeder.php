<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TypeUnite;
use Illuminate\Support\Str;
class TypeUniteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types=['unité douaniere','unité policiere','gendarmerie', 'unité de pêche et halieutiques'];
        //Type::truncate();
        foreach($types as $type){
         TypeUnite::create([
             'nom'=>$type,
             'uuid'=>Str::uuid()
             ]);

        }
    }
}
