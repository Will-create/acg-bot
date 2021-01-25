<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Ordre;
use App\Models\Espece;
use GuzzleHttp\Client;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class EspeceVegetalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Factory::create();
        \Bezhanov\Faker\ProviderCollectionHelper::addAllProvidersTo($faker);
        $faker->addProvider(new \Bezhanov\Faker\Provider\Species($faker));

        $client = new Client();
        $url = "http://apiv3.iucnredlist.org/api/v3/species/page/1?token=9bb4facb6d23f48efbf424bb05c0c1ef1cf6f468393bc745d42179ac4aca5fee";
        $response = $client->request('GET', $url, [
            'verify'  => false,
        ]);
        $especesbody = json_decode($response->getBody());
        $especes = $especesbody->result;
        $animaux = [
            '',
        ];
        for ($i=0; $i <140 ; $i++) {
            $num = rand(1,count($especes));
            $espece= $especes[$num];
            if (isset($espece)){
                if( $espece->kingdom_name == "PLANTAE"){
                    Espece::create([
                        'nom'                   => $espece->scientific_name,
                        'uuid'                  => Str::uuid(),
                        'photo'                 => 'espece_uploads/' .$faker->file('public/espece_vegetal', 'storage/app/public/espece_uploads', false),
                        'famille'               => $espece->family_name,
                        'regne'                 => 'végétal',
                        'nom_scientifique'      => $espece->scientific_name,
                        'ordre_id'              => Ordre::inRandomOrder()->first()->id
                        ]);
                } else {
                    Espece::create([
                        'nom'                   => $espece->phylum_name,
                        'uuid'                  => Str::uuid(),
                        'photo'                 => 'espece_uploads/' .$faker->file('public/espece_animal',   'storage/app/public/espece_uploads', false),
                        'famille'               => $espece->family_name,
                        'regne'                 => 'animal',
                        'nom_scientifique'      => $espece->scientific_name,
                        'ordre_id'              => Ordre::inRandomOrder()->first()->id
                    ]);
                }
            }
        }
    }
}
