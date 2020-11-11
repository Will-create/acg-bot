<?php

namespace Database\Seeders;
use App\Models\Pay;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PaysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //  Pay::truncate();
        $pays=[
        ['Bénin','bj'],
        ['Burkina Faso','bf'],
        ['Cap Vert','cv'],
        ['Côte d\'Ivoire','ci'],
        ['Gambie','gm'],
        ['Ghana','gh'],
        ['Guinée','gn'],
        ['Guinée-Bissau','gw'],
        ['Libéria','lr'],
        ['Mali','ml'],
        ['Mauritanie','mr'],
        ['Niger','ne'],
        ['Nigéria','ng'],
        ['Sénégal','sn'],
        ['Sierra Leone','sl'],
        ['Togo','tg']
                ];

                foreach($pays as $pay){
                    Pay::create(['nom'=>$pay[0],
                                'uuid'=>Str::uuid(),
                                'icone'=>'/images/flags/'.$pay[1].'.svg'
                                ]);
                }
    }
}
