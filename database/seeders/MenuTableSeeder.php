<?php

namespace Database\Seeders;
use App\Models\TypeMenu;
use Illuminate\Database\Seeder;
use Faker\Factory;
use App\Models\User;
use App\Models\Menu;
use Illuminate\Support\Str;

class MenuTableSeeder extends Seeder
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
        $operateurs=operateurs();
        $types=TypeMenu::all();
        $liste = [
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
                    [
                            'nom' => 'Actu SPORT',
                            'liste' =>[
                                'Coupe du monde',
                                'Coupe d\'Afrique',
                                'Coupe d\'Europe',
                                'League',
                                'National',
                                'Autres'
                            ]
                    ],
                    [
                        'nom' => 'Actu REGION',
                        'liste' =>[
                            'Asie Pacifique',
                            'Ameriques',
                            'Moyen Orient',
                            'Afrique',
                            'France',
                            'Monde',
                            'Burkina Faso'
                        ]
                    ],
                    [
                            'nom' => 'Actu THEMATIQUE',
                            'liste' =>[
                                'Découvertes',
                                'Planète',
                                'Culture',
                                'Sports',
                                'Economie',
                            ]
                    ],
                    [
                            'nom' => 'AEROPORTS',
                            'liste' =>[
                                'BOBO DIOULASSO',
                                'OUAGADOUGOU',
                            ]
                    ],
                    [
                        'nom' => 'AGENCE IMMOBLIIERES',
                        'liste' =>[
                            'BOBO DIOULASSO',
                            'OUAGADOUGOU',
                        ]
                   ],
                   [
                    'nom' => 'AGENCE LOCATION VEHICULE',
                    'liste' =>[
                        'MOGG(Magic Ophir Garage Général)',
                        'National Location',
                        'Kili Kili',
                        'Europcar GR. Bangrin',
                        'Diacfa auto national',
                        'CFAO motors avis',
                        'Avis',
                        'Dez Auto',
                        'ADA',
                        'BOBO DIOULASSO',
                        'OUAGADOUGOU',
                    ]
                ],
                [
                    'nom' => 'AMBULANCE',
                    'liste' =>[
                        'BOBO DIOULASSO',
                        'OUAGADOUGOU',
                    ]
                ],
                [
                    'nom' => 'ASSURANCES',
                    'liste' =>[
                        'GLOBUS-RE',
                        'YELEN',
                        'JACKSON',
                        'CORIS',
                        'SAHAM',
                        'GA IARD',
                        'UAB IARDT',
                        'SUNU IARD',
                        'SONAR IARD',
                        'SAHAM VIE',
                        'CORIS VIE',
                        'CIF VIE',
                        'SUNU VIE',
                        'GA VIE',
                        'UAB VIE',
                        'SONAR VIE',
                        'ASSURANCE BOBO',
                        'ASSURANCE OUAGA',
                    ]
            ],
            [
                'nom' => 'BANQUES',
                'liste' =>[
                    'SAFCA',
                    'SOFIGIB',
                    'SOBCA',
                    'FIDELIS',
                    'CBAO',
                    'ORABANK',
                    'UBA',
                    'SOCIETE GENERALE',
                    'BDU BF',
                    'ECOBANK',
                    'CORIS BANK',
                    'BSIC',
                    'BICIAB',
                    'IB BANK',
                    'BCB',
                    'BADF',
                    'BANQUE ATLANTIQUE',
                    'BOA',
                    'WBI',
                    'Banque Bobo',
                    'Banque Ouaga',                                             
                ]
            ],
            [
                    'nom' => 'Boite de nuit',
                    'liste' =>[
                        'Sud Ouest Gaoua',
                        'Sahel Dori',
                        'Est FADA',
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
            [
                    'nom' => 'CASINOS',
                    'liste' =>[
                        'BOBO DIOULASSO',
                        'OUAGADOUGOU',
                    ]
            ],
            [
                'nom' => 'CLINIQUES',
                'liste' =>[
                    'Sud Ouest Gaoua',
                    'Sahel Dori',
                    'Est FADA',
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
           [
            'nom' => 'Compagnies Aériennes',
            'liste' =>[
                'Air Antrack',
                'Point Afrique',
                'Brussels Airlines',
                'Air Cote divoir',
                'Faso Airway',
                'Cameroon Airlines',
                'Air lines',
                'Air Mali',
                'Air Pointafrik',
                'Air mauritanie',
                'Air Ghana',
                'Air Sénégal',
                'Air DHL',
                'Air Asky',
                'Air Ethiopia',
                'Air Algérie',
                'Air Maroc',
                'Air Afriquya',
                'Air Ivoire',
                'Air France',
                'Air Burkina',
            ]
        ],
        [
            'nom' => 'AMBULANCE',
            'liste' =>[
                'BOBO DIOULASSO',
                'OUAGADOUGOU',
            ]
        ],
        [
                            'nom' => 'Actu THEMATIQUE',
                            'liste' =>[
                                'Découvertes',
                                'Planète',
                                'Culture',
                                'Sports',
                                'Economie',
                            ]
                    ],
                    [
                            'nom' => 'AEROPORTS',
                            'liste' =>[
                                'BOBO DIOULASSO',
                                'OUAGADOUGOU',
                            ]
                    ],
                    [
                        'nom' => 'AGENCE IMMOBLIIERES',
                        'liste' =>[
                            'BOBO DIOULASSO',
                            'OUAGADOUGOU',
                        ]
                   ],
                   [
                    'nom' => 'AGENCE LOCATION VEHICULE',
                    'liste' =>[
                        'MOGG(Magic Ophir Garage Général)',
                        'National Location',
                        'Kili Kili',
                        'Europcar GR. Bangrin',
                        'Diacfa auto national',
                        'CFAO motors avis',
                        'Avis',
                        'Dez Auto',
                        'ADA',
                        'BOBO DIOULASSO',
                        'OUAGADOUGOU',
                    ]
                ],
                [
                    'nom' => 'AMBULANCE',
                    'liste' =>[
                        'BOBO DIOULASSO',
                        'OUAGADOUGOU',
                    ]
                ],
                [
                    'nom' => 'ASSURANCES',
                    'liste' =>[
                        'GLOBUS-RE',
                        'YELEN',
                        'JACKSON',
                        'CORIS',
                        'SAHAM',
                        'GA IARD',
                        'UAB IARDT',
                        'SUNU IARD',
                        'SONAR IARD',
                        'SAHAM VIE',
                        'CORIS VIE',
                        'CIF VIE',
                        'SUNU VIE',
                        'GA VIE',
                        'UAB VIE',
                        'SONAR VIE',
                        'ASSURANCE BOBO',
                        'ASSURANCE OUAGA',
                    ]
            ],
            [
                'nom' => 'BANQUES',
                'liste' =>[
                    'SAFCA',
                    'SOFIGIB',
                    'SOBCA',
                    'FIDELIS',
                    'CBAO',
                    'ORABANK',
                    'UBA',
                    'SOCIETE GENERALE',
                    'BDU BF',
                    'ECOBANK',
                    'CORIS BANK',
                    'BSIC',
                    'BICIAB',
                    'IB BANK',
                    'BCB',
                    'BADF',
                    'BANQUE ATLANTIQUE',
                    'BOA',
                    'WBI',
                    'Banque Bobo',
                    'Banque Ouaga',                                             
                ]
            ],
            [
                    'nom' => 'Boite de nuit',
                    'liste' =>[
                        'Sud Ouest Gaoua',
                        'Sahel Dori',
                        'Est FADA',
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
            [
                    'nom' => 'CASINOS',
                    'liste' =>[
                        'BOBO DIOULASSO',
                        'OUAGADOUGOU',
                    ]
            ],
            [
                'nom' => 'CLINIQUES',
                'liste' =>[
                    'Sud Ouest Gaoua',
                    'Sahel Dori',
                    'Est FADA',
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
           [
            'nom' => 'Compagnies Aériennes',
            'liste' =>[
                'Air Antrack',
                'Point Afrique',
                'Brussels Airlines',
                'Air Cote divoir',
                'Faso Airway',
                'Cameroon Airlines',
                'Air lines',
                'Air Mali',
                'Air Pointafrik',
                'Air mauritanie',
                'Air Ghana',
                'Air Sénégal',
                'Air DHL',
                'Air Asky',
                'Air Ethiopia',
                'Air Algérie',
                'Air Maroc',
                'Air Afriquya',
                'Air Ivoire',
                'Air France',
                'Air Burkina',
            ]
        ],
        [
            'nom' => 'CULTURE',
            'liste' =>[
                'Culture Sitho',
                'Culture SNC',
                'Culture Fespaco',
                'Culture Siao',
                'Culture Autres'
            ]
            ],
            [
                'nom' => 'DIVERTISSEMENT',
                'liste' =>[
                    'Net de la semaine',
                    'Astuce ce la semaine',
                    'Proverbe de la semaine',
                    'Pensée de la semaine',
                    'Citation du jour',
                    'Blague du jour',
                ]
        ],
        [
                'nom' => 'HOPITAUX',
                'liste' =>[
                    'Sud Ouest GaouSa',
                    'Sahel Dori',
                    'Est FADA',
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
    'nom' => 'HOROSCOPE QUOTIDIEN',
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
            'Sud Ouest Gaoua',
            'Sahel Dori',
            'Est FADA',
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
    [
        'nom' => 'INFOS DIVERSES',
        'liste' =>[
            'Info denrées',
            'Info métaux',
            'Info matériaux',
            'Info bourse',
            'Info devises',
        ]
    ],
    [
        'nom' => 'INSTITUTIONS',
        'liste' =>[
            'Assemblee Nationale',
            'UEMOA',
            'CILSS',
            'CES',
            'CNVA',
        ]
],
[
    'nom' => 'MARCHÉS',
    'liste' =>[
        'Date concours',
        'Date examens',
        'Marché Bobo',
        'Marché Ouaga',
    ]
],
[
        'nom' => 'MEDIA',
        'liste' =>[
            'Closer',
            'Planète enfant',
            'Planète jeune',
            'Brune',
            'Afrique fashion',
            'Amina',
            'Le Diplomatique',
            'Afrique Magazine',
            'Jeune Afrique',
            'JJ',
            'Pays',
            'Observateur',
            'Sidwaya',
        ]
],
[
        'nom' => 'MICRO FINANCES',
        'liste' =>[
            'SID',
            'PRODIA AC',
            'PAMF B',
            'MUFEDE',
            'MIFA SA',
            'MICROFI SA',
            'MICROAID',
            'MICRO START',
            'MECP "Laafi Sira Kwieogo"',
            'MECAP BF',
            'MECAD PO',
            'MEC Song Taaba',
            'GRAINE SARL',
            'FIPROXI SA',
            'FINEC Burkina SA',
            'FINACOM',
            'FCPB',
            'ETNA MICROFINANCE',
            'CPB',
            'COOPEC GALOR',
            'COOPEC AFA',
            'CODEC OUAGA',
            'CIF',
            'CEC SI',
            'CAISSE LIGDI BAORE',
            'C.E.C',
            'BAOBAB',
            'CIF',
            'VCBM',
            'ASSOCIATION YIKIRI',
            'ASSIENA',
            'APFI',
            'ACEP BURKINA',
            'ACFIME',
            'Microfinance Bobo',
            'Microfinance Ouaga'
        ]
],
[
    'nom' => 'ONEA',
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
'nom' => 'PHARMACIES',
'liste' =>[
    'Sud Ouest Gaoua',
    'Sahel Dori',
    'Est FADA',
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
[
'nom' => 'POLICE NATIONALE',
'liste' =>[
    'Sud Ouest Gaoua',
    'Sahel Dori',
    'Est FADA',
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
[
    'nom' => 'GENDARMERIE NATIONALE',
    'liste' =>[
        'Sud Ouest Gaoua',
        'Sahel Dori',
        'Est FADA',
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
    [
        'nom' => 'PROGRAMME CINE',
        'liste' =>[
            'Cine CCF',
            'Cine Cana Olympia Yennega',
            'Cine Melies',
            'Cine Sagnon',
            'Cine neerwaya',
            'Cine Burkina',
        ]
        ],
        [
            'nom' => 'PROGRAMME TV AUTRES',
            'liste' =>[
                'TV arte',
                'TV canal +',
                'TV France 3',
                'TV FRANCE 5',
                'TV FRANCE 2',
                'TV Itele',
                'TV tf1',
            ]
            ],
            [
                'nom' => 'PROGRAMME TV BURKINA',
                'liste' =>[
                    'Burkina Infos TV',
                    'TV Neerwaya',
                    '3TV',
                    'Savane TV',
                    'LCA tv',
                    'Omega TV',
                    'TV Tele Citoyenne',
                    'Soleil TV',
                    'Sanmatenga TV (STV)',
                    'TV Alhouda',
                    'TV MuslimTelevision Ahmadiyya (MTVA)',
                    'Impact TV',
                    'TV EL Bethel TV',
                    'TV Canal Viim Koega (CVK)',
                    'TVZ Africa',
                    'TV BF1',
                    'TV Canal3',
                    'TV smtv',
                    'TV africable',
                    'TV tv5',
                    'TV tnb',
                    'TV canal',
                    'TV arte',
                    'TV canal +',
                    'TV France 3',
                    'TV FRANCE 5',
                    'TV FRANCE 2',
                    'TV Itele',
                    'TV tf1',
                ]
                ],
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
                        'Est FADA',
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
                    [
                        'nom' => 'RESTAURANTS',
                        'liste' =>[
                            'Sud Ouest Gaoua',
                            'Sahel Dori',
                            'Est FADA',
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
                        [
                            'nom' => 'SERVICES PUBLIQUES',
                            'liste' =>[
                                'Armée de Terre',
                                'Armée de l\'air',
                                'Eau et Foret',
                                'Douane',
                                'Renseignement',
                            ]
                            ],
                            [
                                'nom' => 'SOCIETES',
                                'liste' =>[
                                    'SOCIETE mecanique',
                                    'SOCIETE jardinage',
                                    'SOCIETE maconnerie',
                                    'SOCIETE electricite',
                                    'SOCIETE gardiennage',
                                    'SOCIETE plomberie',
                                ]
                                ],
                                [
                                    'nom' => 'SERVICES ',
                                    'liste' =>[
                                        'Armée de Terre',
                                        'Armée de l\'air',
                                        'Eau et Foret',
                                        'Douane',
                                        'Renseignement',
                                    ]
                                    ],
                                    [
                                        'nom' => 'SONABEL',
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
                                        'nom' => 'SPECTACLE DE LA SEMAINE',
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
                                        'nom' => 'SUPER MARCHE',
                                        'liste' =>[
                                            'Sud Ouest Gaoua',
                                            'Sahel Dori',
                                            'Est FADA',
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
                                        [
                                            'nom' => 'GENDARMERIE NATIONALE',
                                            'liste' =>[
                                                'Bobo Dioulasso',
                                                'Ouagadougou',
                                            ]
                                            ],
                                            [
                                                'nom' => 'INFOS TELECEL',
                                                'liste' =>[
                                                    'infos promo',
                                                    'infos mms',
                                                    'infos navitel',
                                                    'infos postpaidpro',
                                                    'infos smscorporate',
                                                    'infos kit',
                                                    'infos bonusappel',
                                                    'infos privilege',
                                                    'infos web2sms',
                                                    'infos conference',
                                                    'infos flotte',
                                                    'infos forfait',
                                                    'infos postpaid',
                                                    'infos faxinternet',
                                                    'infos publiphones',
                                                    'infos sonneries',
                                                    'infos sms2mail',
                                                    'infos complices',
                                                    'infos asim',
                                                    'infos services',
                                                    'Couv centre',
                                                    'Couv sud',
                                                    'Couv nord',
                                                    'Couv est',
                                                    'Couv ouest',
                                                    'anonymat postpaid',
                                                    'anonymat prepaid',
                                                ]
                                                ]
];
        for ($i=0; $i < count($liste) ; $i++) {
            $uuid = Str::uuid();
            Menu::create([
                'nom'                    =>$liste[$i]['nom'],
                'operateur'                    =>$operateurs[0]['nom'],
                'type_menu_id'           =>1,
                'uuid'                   =>$uuid,
                'description'            =>'[description]'
            ]);
            $id =  Menu::where('uuid',$uuid)->first()->id;
            $nom =  $liste[$i]['nom'];
            foreach($liste[$i]['liste'] as $list){
                $pseudo = Str::slug($list.' '.$operateurs[0]['nom']);
                $sousmenu = Menu::create([
                    'nom'                         => $list,
                    'pseudo'                         =>$pseudo,
                    'operateur'                    =>$operateurs[0]['nom'],
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
