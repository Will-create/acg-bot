<?php

namespace Database\Factories;

use App\Models\Pay;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PayFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pay::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
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


            foreach ($pays as $key => $pay) {
                return [
                    'uuid'                      => Str::uuid(),
                    'nom'                       =>$pay[0],
                     'icone'                    =>'/images/flags/'.$pay[1].'.svg',
                    'codeiso3_pays_origine'     =>strtoupper($pay[1]),
                ];
            }



    }
}
