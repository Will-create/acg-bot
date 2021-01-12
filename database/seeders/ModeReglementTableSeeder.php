<?php

namespace Database\Seeders;

use App\Models\ModeReglement;
use Illuminate\Database\Seeder;


class ModeReglementTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $modes = ['Transaction forestière','Poursuite judiciaire'];
        foreach($modes as $mode){
            ModeReglement::create([
                'mode' => $mode,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.' 
            ]);
        }
    }
}
