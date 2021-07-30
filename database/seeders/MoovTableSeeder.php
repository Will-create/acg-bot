<?php

namespace Database\Seeders;
use App\Models\TypeMenu;
use Illuminate\Database\Seeder;
use Faker\Factory;
use App\Models\User;
use App\Models\Menu;
use Illuminate\Support\Str;

class MoovTableSeeder extends Seeder
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
                //     [
                //         'nom' => 'Accouchement',
                //         'liste' =>[
                //           'accouchement'
                //     ]
                // ],
                //     [
                //         'nom' => 'Actualité internationale',
                //         'liste' =>[
                //                 'Téléphonie Mobile',
                //                 'Nouvelles financières',
                //                 'Nouvelles dans le monde',
                //                 'Nouvelles du showbiz',
                //                 'Nouvelles du moyen orient',
                //                 'Nouvelles d\'Asie',
                //                 'Nouvelles africaines',
                //                 'Nouveaux titres',
                //                 'Diernières nouvelles',
                //         ]
                //     ],
                //     [
                //         'nom' => 'Actualité nationale',
                //         'liste' =>[
                //             'Nouvelles financières',
                //             'Nouvelles a propos du showbiz',
                //             'Nouveaux titres',
                //             'Diernières nouvelles',
                //         ]
                //     ],
                //     [
                //             'nom' => 'Actu sport',
                //             'liste' =>[
                //                    'Autres',
                //                    'Football internationale',
                //                    'Football Nationale',
                //                    'Autres',
                //             ]
                //     ],
                //     [
                //         'nom' => 'Actualité',
                //         'liste' =>[
                //                'Marchés du jours',
                //         ]
                // ],
                //     [
                //         'nom' => 'AGENCE DE VOYAGE ET TOURISME DU MINISTERE',
                //         'liste' =>[
                //             'AVT Ouahigouya',
                //             'AVT Koudougou',
                //             'AVT Bobo Dioulasso',
                //             'AVT Ouagadougou',
                //         ]
                //     ],
                //     [
                //             'nom' => 'ALERT JOB',
                //             'liste' =>[
                //                 'Alert job'
                //             ]
                //     ],
                //     [
                //             'nom' => 'ASTUCES NEWS',
                //             'liste' =>[
                //                 'Carrière professionelle',
                //                 'Vie de couple',
                //                 'Grand Mère',
                //                 'Cuisine',
                //                 'Beauté',
                //                 'Santé',
                //             ]
                //     ],
                //     [
                //         'nom' => 'CINEMA',
                //         'liste' =>[
                //             'Cinéma Sagnon',
                //             'Cinéma CCF',
                //             'Cinéma Burkina',
                //             'Cinéma Nerwaya',
                //         ]
                //     ],
                //     [
                //     'nom' => 'CLINIQUES',
                //     'liste' =>[
                //         'Bobo 2',
                //         'Ouaga 2',
                //         'Bobo',
                //         'Ouaga',
                //     ]
                //     ],
                //     [
                //         'nom' => 'DIVERTISSEMENT',
                //         'liste' =>[
                //             'Citation du jour',
                //             'Blague du jour',
                //         ]
                //     ],
                //     [
                //         'nom' => 'ETABLISSEMENT TOURISTIQUES ET HOTELIERES',
                //         'liste' =>[
                //         ]
                //     ],
                //     [
                //         'nom' => 'FINANCES',
                //         'liste' =>[
                //             'CORIS BANK',
                //             'ECOBANK',
                //             'BRS',
                //             'BSIC',
                //             'BOA',
                //             'SGBB',
                //             'BCB',
                //             'BACB',
                //             'BIB',
                //             'BICIAB',
                //             'BCEAO',
                //         ]
                //     ],
                //     [
                //             'nom' => 'Grossesse',
                //             'liste' =>[
                //                 'Grossesse'
                //             ]
                //     ],
                //     [
                //         'nom' => 'ASSURANCES',
                //         'liste' =>[
                //             'GÉNÉRAL DES ASSURANCES',
                //             'COLINA',
                //             'UAB',
                //             'FONCIAS',
                //             'SONAR',
                //         ]
                // ],
                // [
                //         'nom' => 'HOPITAUX',
                //         'liste' =>[
                //             'Gaoua',
                //             'Dori',
                //             'FADA',
                //             'Manga',
                //             'Ziniaré',
                //             'Kaya',
                //             'Tenkodogo',
                //             'Dédougou',
                //             'Koudougou',
                //             'Banfora',
                //             'Ouahigouya',
                //             'Bobo Dioulasso',
                //             'Ouagadougou',
                //         ]
                // ],
                // [
                //     'nom' => 'HOROSCOPE AMOUR',
                //     'liste' =>[
                //         'Poisson',
                //         'Verseau',
                //         'Capricorne',
                //         'Sagittaire',
                //         'Scorpion',
                //         'Balance',
                //         'Vierge',
                //         'Lion',
                //         'Gemeaux',
                //         'taureau',
                //         'Bélier',

                //     ]
                // ],
                // [
                //     'nom' => 'HOROSCOPE ARGENT',
                //     'liste' =>[
                //         'Poisson',
                //         'Verseau',
                //         'Capricorne',
                //         'Sagittaire',
                //         'Scorpion',
                //         'Balance',
                //         'Vierge',
                //         'Lion',
                //         'Gemeaux',
                //         'taureau',
                //         'Bélier',
                //     ]
                // ],
                // [
                //     'nom' => 'HOROSCOPE CLASSIQUE',
                //     'liste' =>[
                //         'Poisson',
                //         'Verseau',
                //         'Capricorne',
                //         'Sagittaire',
                //         'Scorpion',
                //         'Balance',
                //         'Vierge',
                //         'Lion',
                //         'Gemeaux',
                //         'taureau',
                //         'Bélier',
                //     ]
                // ],
                // [
                //     'nom' => 'HOROSCOPE FAMILLE',
                //     'liste' =>[
                //         'Poisson',
                //         'Verseau',
                //         'Capricorne',
                //         'Sagittaire',
                //         'Scorpion',
                //         'Balance',
                //         'Vierge',
                //         'Lion',
                //         'Gemeaux',
                //         'taureau',
                //         'Bélier',
                //     ]
                // ],
                // [
                //         'nom' => 'HOROSCOPE SANTE',
                //         'liste' =>[
                //             'Poisson',
                //             'Verseau',
                //             'Capricorne',
                //             'Sagittaire',
                //             'Scorpion',
                //             'Balance',
                //             'Vierge',
                //             'Lion',
                //             'Gemeaux',
                //             'taureau',
                //             'Bélier',
                //         ]
                // ],
                // [
                //     'nom' => 'HOROSCOPE TRAVAIL',
                //     'liste' =>[
                //         'Poisson',
                //         'Verseau',
                //         'Capricorne',
                //         'Sagittaire',
                //         'Scorpion',
                //         'Balance',
                //         'Vierge',
                //         'Lion',
                //         'Gemeaux',
                //         'taureau',
                //         'Bélier',
                //     ]
                // ],
                // [
                // 'nom' => 'HOTELS',
                // 'liste' =>[
                //     'Fada',
                //     'Kaya',
                //     'Koudougou',
                //     'Banfora',
                //     'Ouahigouya',
                //     'Bobo Dioulasso',
                //     'Ouagadougou',
                // ]
                // ],
                [
                    'nom' => 'INFORMATIONS METEOS',
                    'liste' =>[
                            'Aujoudh\'hui Gaoua',
                            'Aujoudh\'hui Dori',
                            'Aujoudh\'hui FADA',
                            'Aujoudh\'hui Manga',
                            'Aujoudh\'hui Ziniaré',
                            'Aujoudh\'hui Kaya',
                            'Aujoudh\'hui Tenkodogo',
                            'Aujoudh\'hui Dédougou',
                            'Aujoudh\'hui Koudougou',
                            'Aujoudh\'hui Banfora',
                            'Aujoudh\'hui Ouahigouya',
                            'Aujoudh\'hui Bobo Dioulasso',
                            'Aujoudh\'hui po',
                            'Prevision Gaoua',
                            'Prevision Dori',
                            'Prevision Fada N\'gourma',
                            'Prevision Manga',
                            'Prevision Ziniaré',
                            'Prevision Kaya',
                            'Prevision Tenkodogo',
                            'Prevision Dédougou',
                            'Prevision Koudougou',
                            'Prevision Banfora',
                            'Prevision Ouahigouya',
                            'Prevision Bobo Dioulasso',
                            'Prevision po',

                    ]
                ],
                // [
                //     'nom' => 'INFORMATIONS PRIX CEREALES',
                //     'liste' =>[
                //         'Sud Ouest Gaoua',
                //         'Sahel Dori',
                //         'Est Fada N\'gourma',
                //         'Centre Sud Manga',
                //         'Plateau Central Ziniaré',
                //         'Centre Nord Kaya',
                //         'Centre Est Tenkodogo',
                //         'Boucle du Mouhoun Dédougou',
                //         'Centre Ouest Koudougou',
                //         'Cascades Banfora',
                //         'Nord Ouahigouya',
                //         'Haut Bassins Bobo Dioulasso',
                //         'Centre Ouagadougou',
                //     ]
                // ],
                // [
                //         'nom' => 'INFORMATIONS RADIO',
                //         'liste' =>[
                //             'INFORMATIONS RADIO'
                //         ]
                // ],
                // [
                //         'nom' => 'INFORMATIONS TV',
                //         'liste' =>[
                //             'Burkina Infos TV',
                //             'TV Neerwaya',
                //             '3TV',
                //             'Savane TV',
                //             'LCA tv',
                //             'Omega TV',
                //             'TV Tele Citoyenne',
                //             'Soleil TV',
                //             'Sanmatenga TV (STV)',
                //             'TV Alhouda',
                //             'TV MuslimTelevision Ahmadiyya (MTVA)',
                //             'Impact TV',
                //             'TV EL Bethel TV',
                //             'TV Canal Viim Koega (CVK)',
                //             'TVZ Africa',
                //             'TV BF1',
                //             'TV Canal3',
                //             'TV smtv',
                //             'TV africable',
                //             'TV tv5',
                //             'TV tnb',
                //             'TV canal',
                //         ]
                // ],
                // [
                //     'nom' => 'INFOS MOBICASH',
                //     'liste' =>[
                //         'Magasin Dedougou',
                //         'Magasin Koudougou',
                //     ]
                // ],
                // [
                //     'nom' => 'JEUX DE HASARD',
                //     'liste' =>[
                //             'Tierce',
                //             'Quarte',
                //             'Quinte',
                //             'Loto',
                //             'Couplé',
                //             '4+1',
                // ]
                // ],
                // [
                //     'nom' => 'LOCATIONS VEHICULES',
                //     'liste' =>[
                //     ]
                // ],
                // [
                //     'nom' => 'MANIFESTATIONS',
                //     'liste' =>[
                //     ]
                // ],
                // [
                //         'nom' => 'MODE',
                //         'liste' =>[
                //         ]
                // ],
                // [
                //     'nom' => 'MODE AFRIQUE',
                //     'liste' =>[
                //     ]
                // ],
                // [
                //     'nom' => 'MODE CODE VESTIMENTAIRE',
                //     'liste' =>[
                //     ]
                // ],
                // [
                //     'nom' => 'MODE HISTOIRE DE LA MODE',
                //     'liste' =>[
                //     ]
                // ],
                // [
                //     'nom' => 'MODE INTERNATIONALE',
                //     'liste' =>[
                //     ]
                // ],
                [
                    'nom' => 'RELIGION CHRISTIANISME',
                    'liste' =>[
                        'Prière du Soir',
                        'Angelus',
                        'Prière du matin',
                        'Centre Sud Manga',
                        'Verset biblique du jour',
                        'Psaume du jour',
                        'Parabole du jour',
                        'Evangile du jour',
                    ]
                    ],
                    [
                        'nom' => 'RELIGION ISLAM',
                        'liste' =>[
                            'Islam Nafila',
                            'Verset Corannique du jour',
                            'Hadith du jour',
                            'Sud Ouest Gaoua',
                            'Sahel Dori',
                            'Est Fada N\'gourma',
                            'Centre Sud Manga',
                            'Plateau Central Ziniaré',
                            'Centre Nord Kaya',
                            'Centre Est Tenkodogo',
                            'Boucle du Mouhoun Dédougou',
                            'Centre Ouest Koudougou',
                            'Cascades Banfora',
                            'Nord Ouahigouya',
                            'Haut Bassins Bobo Dioulasso',
                            'Centre Ouagadougou',
                        ]
                        ],
                // [
                //     'nom' => 'MODE GRANDS CREATEURS',
                //     'liste' =>[
                //     ]
                // ],
                // [
                //     'nom' => 'NKALO',
                //     'liste' =>[
                //     ]
                // ],
                // [
                // 'nom' => 'NOURRISSON',
                // 'liste' =>[
                // ]
                // ],
                // [
                //     'nom' => 'ONATEL IMMOBILIER',
                //     'liste' =>[
                //     ]
                // ],

                // [
                //     'nom' => 'PHARMACIE DE GARDE',
                //     'liste' =>[
                //     ]
                // ],
                [
                'nom' => 'Météo',
                        'liste' =>[
                            'Gaoua',
                            'Dori',
                            'Fada',
                            'Manga',
                            'Ziniaré',
                            'Kaya',
                            'Tenkodogo',
                            'Dédougou',
                            'Koudougou',
                            'Banfora',
                            'Ouahigouya',
                            'Bobo Dioulasso',
                            'Ouagadougou',
                        ]
                    ],
                    [
                        'nom' => 'PMU',
                        'liste' =>[
                            'Pronostiqueurs 4',
                            'Pronostiqueurs 3',
                            'Pronostiqueurs 2',
                            'Pronostiqueurs 1',
                            'Coup de Coeur',
                            'Cheval du jour',
                            'Dernière minute',
                            'Non partant officiel',
                            'Rapport Gains du jour',
                            'Résultats du jour',
                            '5 dernières années',
                            'Tocards du jours',
                            'Pronostiques hippiques',
                        ]
                    ],
                    // PMIB et PMUB PROFESSIONNEL à revoir une fois les commntaire enlever
                // [
                //         'nom' => 'PMU',
                //         'liste' =>[
                //         'Coup de Coeur',
                //         'Cheval du jour',
                //         'Dernière minute',
                //         'Non partant officiel',
                //         'Rapport Gains du jour',
                //         'Résultats du jour',
                //         ]
                // ],
                // [
                //         'nom' => 'PMU PROFESSIONEL',
                //         'liste' =>[
                //         'Pronostiqueurs 4',
                //         'Pronostiqueurs 3',
                //         'Pronostiqueurs 2',
                //         'Pronostiqueurs 1',
                //         ]
                // ],
                // [
                //     'nom' => 'POEMES',
                //     'liste' =>[
                //     ]
                // ],
                // [
                //     'nom' => 'RELIGIONS',
                //     'liste' =>[
                //     ]
                // ],
                // [
                //     'nom' => 'RESTAURANTS',
                //     'liste' =>[
                //     ]
                // ],
                // [
                //     'nom' => 'RESTAURANTS AGREE PAR LE MINISTERE',
                //     'liste' =>[
                //     ]
                // ],
                // [
                //     'nom' => 'SITES TOURISTIQUES DU MINISTERE',
                //     'liste' =>[
                //     ]
                // ],
                // [
                //     'nom' => 'SITES TOURISTIQUES',
                //     'liste' =>[
                //     ]
                // ],
                // [
                //     'nom' => 'SOCIETES DE TRANSPORT ROUTIER',
                //     'liste' =>[
                //     ]
                // ],
                // [
                // 'nom' => 'SORTIES ET LOISIRS',
                // 'liste' =>[
                // ]
                // ],
                // [
                //     'nom' => 'SPECTACLES',
                //     'liste' =>[
                //     ]
                //     ],
                //     [
                //         'nom' => 'TENDANCES TIC',
                //         'liste' =>[
                //         ]
                //         ],
                //         [
                //             'nom' => 'TENDANCES ET SANTES',
                //             'liste' =>[
                //             ]
                //             ],
                //             [
                //                 'nom' => 'TRANSPORT AERIEN',
                //                 'liste' =>[
                //                 ]
                //                 ],
                //                 [
                //                     'nom' => 'URGENCES ET NUMEROS UTILES ',
                //                     'liste' =>[
                //                     ]
                //                     ],
                //                     [
                //                         'nom' => 'VOTING FASO ACCADEMY',
                //                         'liste' =>[
                //                         ]
                //                     ],
];

$operateurs=operateurs();

        for ($i=0; $i < count($liste) ; $i++) {
            $uuid = Str::uuid();
            Menu::create([
                'nom'                    =>$liste[$i]['nom'],
                'operateur'              =>$operateurs[1]['nom'],
                'type_menu_id'           =>1,
                'uuid'                   =>$uuid,
                'description'            =>'[description]'
            ]);
            $id =  Menu::where('uuid',$uuid)->first()->id;
            $nom =  $liste[$i]['nom'];
            foreach($liste[$i]['liste'] as $list){
                $pseudo = Str::slug($operateurs[1]['nom'].' '.$nom.' '.$list);
                $sousmenu = Menu::create([
                    'nom'                         => $list,
                    'pseudo'                         =>$pseudo,
                    'operateur'                    =>$operateurs[1]['nom'],
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
