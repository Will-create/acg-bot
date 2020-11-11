<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Ville;

class VilleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $villes=[
            ['Balé','Boromo',2],
            ['Bam','Kongoussi',2],
            ['Banwa','Solenzo',2],
            ['Bazèga','Kombisiri',2],
            ['Bougouriba','Diébougou',2],
            ['Boulgou','Tenkodogo',2],
            ['Boulkiemde','Koudougou',2],
            ['Comoé','Banfora',2],
            ['Ganzourgou','Zorgho',2],
            ['Gnagna','Bogandé',2],
            ['Gourma','Fada N\'gourma',2],
            ['Houet','Bobo-Dioulasso',2],
            ['Ioba','Dano',2],
            ['Kadiogo','Ouagadougou',2],
            ['Kénédougou','Orodara',2],
            ['Komandjari','Gayéri',2],
            ['Kompienga','Pama',2],
            ['Kossi','Nouna',2],
            ['Koulpélogo','Ouargaye',2],
            ['Kouritenga','Koupéla',2],
            ['Kourwéogo','Boussé',2],
            ['Léraba','Sindou',2],
            ['Loroum','Titao',2],
            ['Mouhoun','Dédougou',2],
            ['Nahouri','Pô',2],
            ['Namentenga','Boulsa',2],
            ['Nayala','Toma',2],
            ['Noumbiel','Batié',2],
            ['Oubritenga','Ziniaré',2],
            ['Oudalan','Gorom-Gorom',2],
            ['Passoré','Yako',2],
            ['Poni','Gaoua',2],
            ['Sanguié','Réo',2],
            ['Sanmatenga','Kaya',2],
            ['Séno','Dori',2],
            ['Sissili','Léo',2],
            ['Soum','Djibo',2],
            ['Sourou','Tougan',1],
            ['Tapoa','Diapaga',2],
            ['Tuy','Houndé',2],
            ['Yagha','Sebba',2],
            ['Yatenga','Ouahigouya',2],
            ['Ziro','Sapouy',2],
            ['Zondoma','Gourcy',2],
            ['ZoundWéogo','Manga',2]

        ];
       // Ville::truncate();
        foreach($villes as $ville){
            Ville::create([
                'nom'=>$ville[1],
                'uuid'=>Str::uuid(),
                'pays_id'=>rand(1,16)
            ]);
        }
    }
}

