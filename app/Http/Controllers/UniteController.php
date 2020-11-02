<?php

namespace App\Http\Controllers;

use App\Models\Unite;
use App\Models\Pay;
use App\Models\Ville;
use App\Models\User;
use App\Models\Type;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class UniteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $unites=Unite::all();

     
        return view('pages.backOffice.unites.index',compact('unites'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function create()
    {
        $pays=Pay::where('id',auth()->user()->id)->orderBy('nom', 'asc')->get();
        $villes=Ville::where('pays_id',$pays[0]->id)->orderBy('pays_id', 'asc')->get();
        $responsables=User::all();
        $types=Type::all();

        return view('pages.backOffice.unites.form',compact('villes','pays', 'responsables','types'));
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $data=request()->validate([
            'designation'=> ['required','string','max:255','min:3'],
            'type_id'=> ['required','integer'],
            'tel'=> ['required','string','max:255','min:3'],
            'adresse'=> ['required','string','max:255','min:3'],
            'responsable_id'=>['required','integer'],
            'lat'=> ['required','string','max:255','min:8'],
            'long'=> ['required','string','max:255','min:8'],
            'logo'=> ['image','required'],
            'photo_couverture'=> ['image','required'], 
            'pays_id'=> ['required','integer'],
            'ville_id'=> ['required','integer'],
           
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
          $unite->type_id=$data['type_id'];
          $unite->tel=$data['tel'];
    
          $unite->adresse=$data['adresse'];
          $unite->responsable_id=$data['responsable_id'];
          $unite->lat=$data['lat'];
          $unite->long=$data['long'];
          $unite->pays_id =$data['pays_id'];
          $unite->ville_id=$data['ville_id'];
          $unite->uuid=Str::uuid();
          $unite->save();
          
          return redirect()->route('unites.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Unite  $unite
     * @return \Illuminate\Http\Response
     */
    public function show(Unite $unite)
    {  
        return view('pages.backOffice.unites.show', compact('unite'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Unite  $unite
     * @return \Illuminate\Http\Response
     */
    public function edit(Unite $unite)
    {
        $pays=Pay::where('id',auth()->user()->id)->orderBy('nom', 'asc')->get();
        $villes=Ville::where('pays_id',$pays[0]->id)->orderBy('pays_id', 'asc')->get();
        $responsables=User::all();
        $types=Type::all();
        return view('pages.backOffice.unites.edit',compact('unite','responsables','pays','villes','types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Unite  $unite
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Unite $unite)
    {
        $data=request()->validate([
            'designation'=> ['required','string','max:255','min:3'],
            'type_id'=> ['required','integer'],
            'tel'=> ['required','string','max:255','min:3'],
            'adresse'=> ['required','string','max:255','min:3'],
            'responsable_id'=>['required','integer'],
            'lat'=> ['string','max:255','min:8'],
            'long'=> ['string','max:255','min:8'],
            'logo'=> ['image'],
            'photo_couverture'=> ['image'], 
            'pays_id'=> ['required','integer'],
            'ville_id'=> ['required','integer'],
           
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
          $unite->type=$data['type_id'];
          $unite->tel=$data['tel'];
          
          $unite->adresse=$data['adresse'];
          $unite->responsable_id=$data['responsable_id'];
          $unite->lat=$data['lat'];
          $unite->long=$data['long'];
          $unite->pays_id =$data['pays_id'];
          $unite->ville_id=$data['ville_id'];
          $unite->uuid=Str::uuid();
             $unite->save(); 
         
         
          
          return redirect()->route('unites.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Unite  $unite
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Unite $unite)
    {
        $unite->delete();
        
        return redirect()->route('unites.index')->with('message','Unité supprimée avec succès');
    }
}
