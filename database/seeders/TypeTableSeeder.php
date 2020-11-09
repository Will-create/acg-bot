<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Type;
use Illuminate\Support\Str;
class TypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types=['unité douaniere','unité policiere','gendarmerie', 'unité de pêche et halieutiques'];
        Type::truncate();
        foreach($types as $type){
         Type::create([
             'nom'=>$type,
             'uuid'=>Str::uuid()
             ]);

        }
    }
}
