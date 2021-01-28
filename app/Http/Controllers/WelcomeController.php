<?php

namespace App\Http\Controllers;

use App\Models\Pay;
use App\Models\Role;
use App\Models\User;
use App\Models\Crime;
use App\Models\Unite;
use App\Models\Espece;
use App\Models\Localite;
use App\Models\CrimeAuteur;
use App\Models\AireProtegee;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(){
        $pays = Pay::with('crimes')->get();
        $colors = [];
        $nbrcrimes = [];
        //generateur de codes couleur 
        for ($i=0; $i <count($pays);  $i++) { 
            $colors[] = '#' . substr(str_shuffle('ABCDEF0123456789'), 0, 6);
        }
        //resolution du nombre de crime par pays
        foreach($pays as $p){
            $nbrcrimes[] = count($p->crimes);
        }
        $crimes = Crime::with('especes')->get();
        $crimeanimaux = [];
        $crimevegetaux = [];
        function roundFunation($n) 
            { 
                // Smaller multiple 
                $a = (int)($n / 10) * 10; 
                // Larger multiple 
                $b = ($a + 10); 
                // Return of closest of two 
                return ($n - $a > $b - $n) ? $b : $a; 
            } 
        //resolution des especes animales et vegetales impliqués dans chaque crime
        foreach ($crimes as $crime) {
            foreach ($crime->especes as $espece) {
                if($espece->regne == 'animal'){
                    $crimeanimaux[] = $espece;
                }else{
                    $crimevegetaux[] = $espece;
                }
            }
        }
        $especes = Espece::all();
        $total_aires = AireProtegee::all();
        $total_unites = Unite::all();
        $especeanimaux = Espece::where('regne','animal')->get();
        $especevegetaux = Espece::where('regne','!=','animal')->get();
        $startYear = 2009;
        $crimesAnnee = [];// collection des crimes de chaque année
        $data_animaux = [];
        $data_vegetaux = [];
        $data_annees = [];
        for ($i=0; $i < 12; $i++) { 
            $startYear++;
            $crimesAnnee[strval($startYear)]= Crime::with('especes')->whereYear('date_apprehension',$startYear)->get();
            $count_animaux = [];
            $count_vegetaux = [];
            $percent_especeanimaux = roundFunation(intval((count($especeanimaux) / count($especes) ) * 100));
            $percent_especevegetaux = roundFunation(intval((count($especevegetaux) / count($especes) ) * 100));
            foreach($crimesAnnee[strval($startYear)] as $crime){
                foreach( $crime->especes as $espece){
                    if($espece->regne == 'animal'){
                        $count_animaux[] = $espece;
                    }else{
                        $count_vegetaux[] = $espece;
                    }
                }
            }
            $data_animaux[] = count($count_animaux);
            $data_vegetaux[] = count($count_vegetaux);
            $data_annees[] = strval($startYear);
        }
        $roleAgent = Role::where('designation', 'Chef d’Unité')->first();
        $months = ['Jan', 'Fev', 'Mar', 'Avr', 'Mai', 'Jun', 'Jul','Aou','Sep','Oct','Nov','Dec'];
        $current_month = intval(date('M'));
        $current_year_months = [];
        $data_current_year_months = [];
        for ($i=0; $i < $current_month+1; $i++) { 
            $current_year_months[] = $months[$i];
            $data = Crime::whereYear('date_apprehension',intval(date('Y')))->whereMonth('date_apprehension',$i)->get();
            $data_current_year_months[] = count($data);
        }
            return view('pages.frontoffice.index',[
                'pays' => $pays,
            'pays_colors' => json_encode($colors),
            'pays_nbrcrimes' => json_encode($nbrcrimes),
            'pays_labels' => json_encode($pays->pluck('nom')),
            'total_crimes' => count($crimes),
            'total_aires' => count($total_aires),
            'total_unites' => count($total_unites),
            'total_especes' => count($especes),
            'total_crimesanimaux' => count($crimeanimaux),
            'total_crimevegetaux' => count($crimevegetaux),
            'total_especevegetaux' => count($especevegetaux),
            'total_especeanimaux' => count($especeanimaux),
            'crimesAnnee' => json_encode($crimesAnnee),
            'data_animaux' => json_encode($data_animaux),
            'data_vegetaux' => json_encode($data_vegetaux),
            'data_annees' => json_encode($data_annees),
            'agents' => count(User::where('role_id',$roleAgent->id)->get()),
            'current_year' => intval(date('Y')),
            'crimes_current_year' => $crimesAnnee[ intval(date('Y'))-1],
            'current_month' => json_encode($current_month),
            'current_year_months' => json_encode($current_year_months),
            'data_current_year_months' => json_encode($data_current_year_months), 
            'percent_especeanimaux' => json_encode($percent_especeanimaux),
            'percent_especevegetaux' => json_encode($percent_especevegetaux)
        ]);
    }
    public function crime(){
        $pays = Pay::with('crimes')->get();
        return view('pages.frontoffice.crimes',[
            'pays' =>$pays,
            'nom' =>'Crimes environnementaux'

        ]);
    }
    public function animale(){
        $pays = Pay::with('crimes')->get();
        return view('pages.frontoffice.espece',[
            'pays' =>$pays,
            'nom' =>'Espèces animales'
            
        ]);
    }
    public function vegetale(){
        $pays = Pay::with('crimes')->get();
        return view('pages.frontoffice.espece',[
            'pays' =>$pays,
            'nom' =>'Espèces végztales'
            
            
        ]);
    }
    public function pays($nom,$uuid){
        $pays = Pay::with('crimes')->get();
        return view('pages.frontoffice.pays',[
            'pays' =>$pays,
            'nom' =>$nom
        ]);
    }
}