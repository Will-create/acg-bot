<?php

namespace Database\Seeders;
use App\Models\TypeMenu;
use Illuminate\Database\Seeder;
use Faker\Factory;
use App\Models\User;
use App\Models\Menu;
use Illuminate\Support\Str;
class MaliTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=Factory::create();
        $users=User::all();
        $types=TypeMenu::all();
        $liste = [
                    [
                        'nom' => 'Actu Internationale',
                        'liste' =>[
                            'Téléphonie mobile',
                            'Nouvelles Financières',
                            'Nouvelles dans le monde',
                            'Nouvelles du ShowBiz',
                            'Nouvelles du Moyen Orient',
                            'Nouvelles Asie',
                            'Nouvelles Afrique',
                            'Nouveaux titres',
                            'Dernières nouvelles',
                        ]
                    ],
                    [
                        'nom' => 'Actu Nationale',
                        'liste' =>[
                            'Nouvelles Financières',
                            'Nouvelles dans le monde',
                            'Nouveaux titres',
                            'Dernières nouvelles'
                        ]
                    ],
                    [
                        'nom' => 'Assurances',
                        'liste' =>[
                            'Autres',
                            'SONAVIE',
                            'SAHAM ASSURANCE',
                            'SABU NYUMAN',
                            'NSIA MALI',
                            'INPS',
                            'CIRAS',
                            'CANAM',
                            'ASSURANCES LAFIA',
                            'ASSURANCES BLEUES',
                            'ALLIANZ',
                        ]
                    ],
                    [
                        'nom' => ' Banques',
                        'liste' =>[
                            'BIM',
                            'CORIS BANK',
                            'ORABANK',
                            'AUTRES',
                            'ECOBANK',
                            'CAMEC NATIONALE',
                            'BOA',
                            'BNDA',
                            'BICIM',
                            'BHM',
                            'BDM',
                        ]
                    ],
                    [
                        'nom' => 'BOITE DE NUIT',
                        'liste' =>[
                           'AUTRES',
                           'SIKASSO',
                           'BAMAKO',
                        ]
                    ],
                    [
                        'nom' => 'CINEMA',
                        'liste' =>[
                            'AUTRES',
                            'BABEMBA CINE',
                            'CCF',
                        ]
                    ],
                    [
                        'nom' => 'CLINIQUES',
                        'liste' =>[
                            'Tombouctou',
                            'Gao',
                            'Kidal',
                            'Koulikoro',
                            'segou',
                            'Kayes',
                            'Mopti',
                            'Sikasso',
                            'Bamako',
                        ]
                    ],
                    [
                        'nom' => 'Cours de Change',
                        'liste' =>[
                           'Cours de Change'
                        ]
                   ],
                   [
                        'nom' => 'Default Application',
                        'liste' =>[
                            'Mot cle inconnu'
                        ]
                    ],
                    [
                        'nom' => 'DIVERTISSEMENTS',
                        'liste' =>[
                            'Citations',
                            'Blagues',
                        ]
                    ],
                    [
                        'nom' => 'FOOTBALL',
                        'liste' =>[
                            'Ouganda',
                            'Egypte',
                            'Mali',
                            'Ghana',
                            'Togo',
                            'Maroc',
                            'RD Congo',
                            'Côte d\'Ivoire',
                            'Zimbabwe',
                            'Senegal',
                            'Tunisie',
                            'Algerie',
                            'Guinee Bissau',
                            'Cameroun',
                            'Burkina Faso',
                            'Gabon',
                            'CAN',
                        ]
                    ],
                    [
                        'nom' => 'Heures de prières musulmanes',
                        'liste' =>[
                            'Tombouctou',
                            'Gao',
                            'Kidal',
                            'Koulikoro',
                            'segou',
                            'Kayes',
                            'Mopti',
                            'Sikasso',
                            'Bamako',                                  
                        ]
                    ],
                    [
                        'nom' => 'HOPITAUX',
                        'liste' =>[ 
                            'Tombouctou',
                            'Gao',
                            'Kidal',
                            'Koulikoro',
                            'segou',
                            'Kayes',
                            'Mopti',
                            'Sikasso',
                            'Bamako',
                            ]
                    ],
                    [
                        'nom' => 'Horoscope',
                        'liste' =>[
                            'Poisson',
                            'Verseau',
                            'Capricorne',
                            'Sagittaire',
                            'Scorpion',
                            'Balance',
                            'Vierge',
                            'Lion',
                            'Gemeaux',
                            'taureau',
                            'Bélier',
                        ]
                    ],
                    [
                        'nom' => 'HOROSCOPE AMOUR',
                        'liste' =>[
                            'Poisson',
                            'Verseau',
                            'Capricorne',
                            'Sagittaire',
                            'Scorpion',
                            'Balance',
                            'Vierge',
                            'Lion',
                            'Gemeaux',
                            'taureau',
                            'Bélier',
                        ]
                    ],
                    [
                        'nom' => 'HOROSCOPE ARGENT',
                        'liste' =>[
                            'Poisson',
                            'Verseau',
                            'Capricorne',
                            'Sagittaire',
                            'Scorpion',
                            'Balance',
                            'Vierge',
                            'Lion',
                            'Gemeaux',
                            'taureau',
                            'Bélier',
                            ]
                    ],
                    [
                        'nom' => 'HOROSCOPE FAMILLE',
                        'liste' =>[
                            'Poisson',
                            'Verseau',
                            'Capricorne',
                            'Sagittaire',
                            'Scorpion',
                            'Balance',
                            'Vierge',
                            'Lion',
                            'Gemeaux',
                            'taureau',
                            'Bélier',
                        ]
                    ],
                    [
                        'nom' => 'HOROSCOPE SANTE',
                        'liste' =>[
                            'Poisson',
                            'Verseau',
                            'Capricorne',
                            'Sagittaire',
                            'Scorpion',
                            'Balance',
                            'Vierge',
                            'Lion',
                            'Gemeaux',
                            'taureau',
                            'Bélier',
                        ]
                    ],
                    [
                        'nom' => 'HOROSCOPE TRAVAIL',
                        'liste' =>[
                            'Poisson',
                            'Verseau',
                            'Capricorne',
                            'Sagittaire',
                            'Scorpion',
                            'Balance',
                            'Vierge',
                            'Lion',
                            'Gemeaux',
                            'taureau',
                            'Bélier',
                        ]
                    ],
                    [
                        'nom' => 'HOTEL',
                        'liste' =>[
                            'Tombouctou',
                            'Gao',
                            'Kidal',
                            'Koulikoro',
                            'segou',
                            'Kayes',
                            'Mopti',
                            'Sikasso',
                            'Bamako',
                        ]
                    ],
                    [
                        'nom' => 'LOCATION VEHICULE',
                        'liste' =>[
                               'Autres',
                               'Freelances',
                               'SERA MALI',
                               'OPEN TOURS',
                               'MAXI CAR',
                               'CFAO MOTORS',
                               'AVIS',
                               'AFRIQUE MOTORS',
                        ]
                    ],
                    [
                        'nom' => 'Meteo Aujourdh\'ui',
                        'liste' =>[
                                'Tombouctou',
                                'Gao',
                                'Kidal',
                                'Koulikoro',
                                'segou',
                                'Kayes',
                                'Mopti',
                                'Sikasso',
                                'Bamako',
                        ]
                    ],
                    [
                        'nom' => 'Meteo Prevision',
                        'liste' =>[
                                 'Tombouctou',
                                'Gao',
                                'Kidal',
                                'Koulikoro',
                                'segou',
                                'Kayes',
                                'Mopti',
                                'Sikasso',
                                'Bamako',
                        ]
                    ],
                    [
                        'nom' => 'PHARMACIE DE GARDE',
                        'liste' =>[
                            'Tombouctou',
                            'Gao',
                            'Kidal',
                            'Koulikoro',
                            'segou',
                            'Kayes',
                            'Mopti',
                            'Sikasso',
                            'Bamako',                                
                            'Commune de Kita',                                
                            'Bamako commune 1',                                
                            'Bamako commune 2',                                
                            'Bamako commune 3',                                
                            'Bamako commune 4',                                
                            'Bamako commune 5',                                
                            'Bamako commune 6',                                
                                      
                        ]
                    ],
                    [
                        'nom' => 'PMU',
                        'liste' =>[
                            'Gains du jour',
                            'Résultats du jour',
                            '5 dernières années',
                            'Tocards du jours',
                            'Pronostiques hippiques',
                        ]
                    ],
                    [
                        'nom' => 'Religion',
                        'liste' =>[
                            'Hadith du jour',
                            'Verset Corannique du jour',
                        ]
                    ],
                    [
                        'nom' => 'Religions',
                        'liste' =>[
                            'Islam NAFILAS'
                        ]
                    ],
                    [
                        'nom' => 'RESTAURANT',
                        'liste' =>[
                            'Autres',
                            'Sikasso',
                            'Bamako',
                        ]
                    ],
                    [
                        'nom' => 'SIM CEREAL',
                        'liste' =>[
                            'Tombouctou',
                                'Gao',
                                'Kidal',
                                'Koulikoro',
                                'segou',
                                'Kayes',
                                'Mopti',
                                'Sikasso',
                                'Bamako',
                        ]
                    ],
                    [
                        'nom' => 'SITES TOURISTIQUES',
                        'liste' =>[
                            'Centre Ouest',
                            'Sud Ouest',
                            'Sud',
                            'Est ',
                            'Nord',
                            'Centre',
                            'Ouest',
                        ]
                    ],
                    [
                        'nom' => 'Test Applications',
                        'liste' =>[
                            
                        ]
                    ],
                    [
                        'nom' => 'TRANSPORT AERIEN',
                        'liste' =>[
                            'Autres',
                            'Ethiopian airlines',
                            'Antrack Air',
                            'Air Algérie',
                            'Air Afriqiah',
                            'Air Sénégal',
                            'Air France',
                            'Air Ivoire',
                            'Air Burkina',
                            'Royal Air Maroc',
                            'Air Mali'
                            
                        ]
                    ],
                    [
                        'nom' => 'TRANSPORT ROUTIER',
                        'liste' =>[
                            'Autres',
                            'SOMATRIE',
                            'SOMATRA',
                            'SOCIETE COULIBALY ET FRERES',
                            'SITAC SA',
                            'MATTRAM SA',
                            'SMTS',
                            'GROUPE SIMAGA',
                            'EXPRESS BUS SARL',
                            'ETABLISSEMENT FOUTANKE',
                            'ECM MULTISERVICE',
                            'COOPERATIVE TRANSPORT ROUTIERS',
                            'BITTAR TRANSPORT',
                            'BINKE TRANSPORT',
                            'BALANZAN TRANSPORT',
                            'ROUTIER SOGETRA',
                        ]
                    ],
                    [
                        'nom' => 'Urgences ET Numero Utiles',
                        'liste' =>[
                            'Autres',
                            'MALITEL2',
                            'CES',
                            'Autres',
                            'CILSS',
                            'UEMOA',
                            'ASSEMBLEE NATIONALE',
                            'PRESIDENCE',
                            'MEDIATEUR',
                            'COURS SUPREME',
                            'RENSEIGNEMENT',
                            'AEROPORT',
                            'SONAPOST',
                            'RECOUVREMENT',
                            'DERANGEMENT',
                            'MALITEL',
                            'SOC SECURITE',
                            'DOUANE',
                            'ARMEE AIR',
                            'ARMEE TERRE',
                            'GENDARMERIE',
                            'POMPIER',
                            'POLICE',
                        ]
                    ],
];
//list of operators from helper function
$operateurs=operateurs();

        for ($i=0; $i < count($liste) ; $i++) {
            $uuid = Str::uuid();
            Menu::create([
                'nom'                    =>$liste[$i]['nom'],
                'operateur'              =>$operateurs[2]['nom'],

                'type_menu_id'           =>1,
                'uuid'                   =>$uuid,
                'description'            =>'[description]'
            ]);
            $id =  Menu::where('uuid',$uuid)->first()->id;
            $nom =  $liste[$i]['nom'];
            foreach($liste[$i]['liste'] as $list){
                $pseudo = Str::slug($list.' '.$operateurs[2]['nom']);
                $sousmenu = Menu::create([
                    'nom'                         => $list,
                    'pseudo'                         =>$pseudo,
                    'operateur'                    =>$operateurs[2]['nom'],
                    'cache'                         =>false,
                    'type_menu_id'                => 2,
                    'automate_id'                => $nom == 'PMU' || $nom == 'PMU PROFESSIONEL' ? 1 : null,
                    'uuid'                        => Str::uuid(),
                    'parent_id'                   =>$id,
                    'parent_uuid'                 => $uuid,
                    'description'                 => '[juste une explication de ce que est censé faire ce sous menu]'
                ]);
            }
        }
    }
}
