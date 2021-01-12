<?php

namespace Database\Seeders;

use App\Models\DecisionJustice;
use Illuminate\Database\Seeder;

class DecisionJusticeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $decisions = [
            'Relaxe du prévenu,',
            'Condamnation du prévenu à l’emprisonnement',
            'Condamnation du prévenu à une amende',
            'Condamnation du prévenu à un emprisonnement avec sursis'
        ];
        foreach($decisions as $decision){
            DecisionJustice::create([
                'decision' => $decision,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.' 
            ]);
        }
    }
}
