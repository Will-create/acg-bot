<?php

namespace Database\Seeders;

use App\Models\Ordre;
use Illuminate\Database\Seeder;

class OrdreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ordre = ['poissons', 'mamifères', 'sapindales', 'rosana'];

        foreach ($ordre as $key => $value) {
            Ordre::create([
                'nom'       => $value,
            ]);
        }
        }
}
