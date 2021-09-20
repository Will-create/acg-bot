<?php
use Carbon\Carbon;
use App\Models\Menu;
use App\Models\Operateur;
if (!function_exists('formatDate')) {
    function formatDate($date)
    {
        $dtime = Carbon::parse($date)->format('d  M Y');
        return $dtime;
    }
}
if (!function_exists('formatMontant')) {
    function formatMontant($montant_du)
    {
        $montant = number_format($montant_du, 0, ',', ' ');
        // $montant = number_format($montant_du, 3, ',', ' ');

        return $montant;
    }
}
if (!function_exists('get_apikey')) {
    function get_apikey()
    {
        return 'piuIZbssamrwCGwT';
    }
}
if (!function_exists('get_apisecret')) {
    function get_apisecret()
    {
        return '9T4Zj1eebd0uLvhaNMTNXlf7HHEknaex';
    }
}

if (!function_exists('promotion')) {
    function promotion($prix, $reduction)
    {
        $reste =  $prix - ($prix * ($reduction/100));
        return $reste;
    }
}

// if (!function_exists('formatel')) {
//     function formatel   ($data)
//     {
//         return "(".substr($data, 0, 5).") ".substr($data, 5, 2)." ".substr($data,7, 2 )." ".substr($data,9, 2)." ".substr($data,11, 2);
//     }
// }

if (!function_exists('formatel')) {
    function formatel   ($data)
    {
        return substr($data, 0, 2)." ".substr($data, 2, 2)." ".substr($data,4, 2 )." ".substr($data,6, 2)." ".substr($data,8, 2);
    }
}
if(!function_exists('operateurs')){
    function operateurs(){
        return [
            [
                'id'          => 1,
                'uuid'          => 'cf771326-cc7f-4893-8a45-ffd501779939',
                'nom'   => 'Telecel Faso',
                'pays'   => 'Burkina Faso',
                'logo'   => 'logo-telecel.jpeg',
                'iso_pays'   => 'bf',
                'cache'   => false,
                'description'   => 'Le lorem ipsum est, en imprimerie, une suite de mots sans signification  utilisée à titre provisoire pour calibrer une mise en page, le texte définitif ve'
            ],
            [
                'id'          => 2,
                'uuid'          => 'cee5fbed-31c8-4968-adb8-8e796c457855',
                'nom'   => 'Moov Africa Burkina',
                'pays'   => 'Burkina Faso',
                'logo'   => 'b963166b7f1c8e623e9054fb5f848aba_M.jpg',
                'iso_pays'   => 'bf',
                'cache'   => false,
                'description'   => 'Le lorem ipsum est, en imprimerie, une suite de mots sans signification  utilisée à titre provisoire pour calibrer une mise en page, le texte définitif ve'
            ],
            [
                'id'          => 3,
                'uuid'          => 'e87d2036-02a5-4097-ad88-8ba51cfbc79e',
                'nom'   => 'MaliTel',
                'pays'   => 'Mali',
                'logo'   => 'malitel-logo.png',
                'iso_pays'   => 'ml',
                'cache'   => false,

                'description'   => 'Le lorem ipsum est, en imprimerie, une suite de mots sans signification  utilisée à titre provisoire pour calibrer une mise en page, le texte définitif ve'
            ],
            // [
            //     'id'          => 4,
            //     'uuid'          => 'f5e3fb8c-b3c2-4754-9eb9-e6ddc151e40e',
            //     'nom'   => 'Moov Africa Bénin',
            //     'pays'   => 'Bénin',
            //     'logo'   => 'b963166b7f1c8e623e9054fb5f848aba_M.jpg',
            //     'iso_pays'   => 'bj',
            //     'cache'   => true,

            //     'description'   => 'Le lorem ipsum est, en imprimerie, une suite de mots sans signification  utilisée à titre provisoire pour calibrer une mise en page, le texte définitif ve'
            // ]
            
        ];
    };
}
if(!function_exists('automates')){
    function automates(){
        return [
            [
                'id'          => 1,
                'uuid'          => 'cf771326-cc7f-4ll3-8a45-ffd501779939',
                'nom'   => 'PMU',
            ],
            [
                'id'          => 2,
                'uuid'          => 'cf771326-cc7f-4kk3-8a45-ffd501779939',
                'nom'   => 'METEO',
            ],
          
        ];
    };
}


if(!function_exists('fonctions')){
    function fonctions($operateur){
        return Menu::where('type_menu_id',1)->with('sousmenus')->where('operateur',$operateur)->orderBy('nom','asc')->get();
    };
}
if(!function_exists('operateur_logo')){
    function operateur_logo($nom){
        $operateurs = operateurs();
        foreach($operateurs as $op){
            if($op['nom'] == $nom){
                $logo = $op['logo'];
                return $logo;
            }
        }
    };
}
if(!function_exists('automate')){
    function automate($id){
        $automates = automates();
        foreach($automates as $ot){
            if($ot['id'] == $id){
                
                return $ot;
            }
        }
    };
}
