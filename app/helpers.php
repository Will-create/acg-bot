<?php
use Carbon\Carbon;

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
