<?php

namespace App\Http\Controllers;

use App\Models\Unite;
use App\Models\Pay;
use App\Models\Localite;
use App\Models\User;
use App\Models\TypeCrime;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class UniteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

  
    public function index()
    {
        $unites=Unite::all();
 
        return view('pages.backoffice.unites.index',compact('unites'));
    }
    public function filter($p)
    {  
        $pay=Pay::where('id',$p )->first();
      
        return view('pages.backoffice.unites.filter', [
            'unites'                    =>Unite::where('pays_id',$pay->id)->get(),
            'pays'                         =>Pay::all(),
            'pay'                          =>$pay
        ]);
    }


    public function create()
    {
        $pays=Pay::where('id',auth()->user()->id)->orderBy('nom', 'asc')->get();
        $localites=Localite::where('pays_id',$pays[0]->id)->orderBy('pays_id', 'asc')->get();
        $responsables=User::all();
        $types= TypeCrime::all();
        return view('pages.backoffice.unites.form',compact('localites','pays', 'responsables','types'));
    }

    public function store(Request $request)
    {
        $data=request()->validate([
            'designation'=> ['required','string','max:255','min:3'],
            'type_unite_id'=> ['required','integer'],
            'tel'=> ['required','string','max:255','min:3'],
            'tel2'=> ['string','max:255','min:3'],
            'administration_tutelle'=> ['required','string','max:255','min:3'],
            'adresse'=> ['required','string','max:255','min:3'],
            'responsable_id'=>['required','integer'],
            'lat'=> ['required','string','max:255','min:8'],
            'long'=> ['required','string','max:255','min:8'],
            'logo'=> ['image','required'],
            'photo_couverture'=> ['image','required'],
            'pays_id'=> ['required','integer'],
            'localite_id'=> ['required','integer'],

          ]);


          $unite= new Unite;



          if($request->hasFile('logo')){

            $file = $request->file('logo');
            $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
            $name = $timestamp. '-' .$file->getClientOriginalName();
            $logoPath=request('logo')->storeAs('logo_uploads',$name,'public');
            $unite->logo = $logoPath;
         }
         if($request->hasFile('photo_couverture')){
            $file = $request->file('photo_couverture');
            $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
            $name = $timestamp. '-' .$file->getClientOriginalName();
            $photoPath=request('photo_couverture')->storeAs('photo_uploads',$name,'public');
            $unite->photo_couverture = $photoPath;
             }

          $unite->designation=$data['designation'];
          $unite->type_unite_id=$data['type_unite_id'];
          $unite->tel=$data['tel'];
          $unite->tel2=$data['tel2'];
          $unite->administration_tutelle=$data['administration_tutelle'];
          $unite->adresse=$data['adresse'];
          $unite->responsable_id=$data['responsable_id'];
          $unite->lat=$data['lat'];
          $unite->long=$data['long'];
          $unite->pays_id =$data['pays_id'];
          $unite->localite_id=$data['localite_id'];
          $unite->uuid=Str::uuid();
          $unite->save();

          $request->session()->flash('status','Unité créée avec succès!!!');
          return redirect()->route('unites.index');


    }

 
    public function show(Unite $unite)
    {  


        function openstreetmap_url($lon, $lat, $zoom=13) {
            $url = 'https:⁄⁄www.openstreetmap.org/?mlat='.$lat.'&amp;mlon='.$lon.'#map='.$zoom.'/'.$lat.'/'.$lon;
            return $url;
        }

        
        $carte=openstreetmap_url($unite->long,$unite->lat);
        return view('pages.backoffice.unites.show', compact('unite','carte'));
    }

    public function edit(Unite $unite)
    {
        $pays=Pay::where('id',auth()->user()->id)->orderBy('nom', 'asc')->get();
        $localites=Localite::where('pays_id',$pays[0]->id)->orderBy('pays_id', 'asc')->get();
        $responsables=User::all();
        $types=TypeCrime::all();
        return view('pages.backoffice.unites.edit',compact('unite','responsables','pays','localites','types'));
    }

   
    public function update(Request $request, Unite $unite)
    {
        $data=request()->validate([
            'designation'=> ['required','string','max:255','min:3'],
            'type_unite_id'=> ['required','integer'],
            'tel'=> ['required','string','max:255','min:3'],
            'tel2'=> ['string','max:255','min:3'],
            'administration_tutelle'=> ['string','max:255','min:3'],
            'adresse'=> ['required','string','max:255','min:3'],
            'responsable_id'=>['required','integer'],
            'lat'=> ['string','max:255','min:8'],
            'long'=> ['string','max:255','min:8'],
            'logo'=> ['image'],
            'photo_couverture'=> ['image'],
            'pays_id'=> ['required','integer'],
            'localite_id'=> ['required','integer'],

          ]);





         if($request->hasFile('logo')){
            $file = $request->file('logo');
            $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
            $name = $timestamp. '-' .$file->getClientOriginalName();
            $logoPath=request('logo')->storeAs('logo_uploads',$name,'public');
            $unite->logo = $logoPath;
         }
         if($request->hasFile('photo_couverture')){
            $file = $request->file('photo_couverture');
            $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
            $name = $timestamp. '-' .$file->getClientOriginalName();
            $photoPath=request('photo_couverture')->storeAs('photo_uploads',$name,'public');
            $unite->photo_couverture = $photoPath;
             }

          $unite->designation=$data['designation'];
          $unite->type_unite_id=$data['type_unite_id'];
          $unite->tel=$data['tel'];
          $unite->tel2=$data['tel2'];
          $unite->administration_tutelle=$data['administration_tutelle'];
          $unite->adresse=$data['adresse'];
          $unite->responsable_id=$data['responsable_id'];
          $unite->lat=$data['lat'];
          $unite->long=$data['long'];
          $unite->pays_id =$data['pays_id'];
          $unite->localite_id=$data['localite_id'];
          $unite->uuid=Str::uuid();
             $unite->save();
          $request->session()->flash('status','Unité mise à jours avec succès!!!');
          return redirect()->route('unites.index');
    }


   
    public function destroy(Request $request, Unite $unite)
    {
        $unite->delete();
        $request->session()->flash('warning','Unité supprimée avec succès!!!');
        return redirect()->route('unites.index')->with('message','Unité supprimée avec succès');
    }
}
