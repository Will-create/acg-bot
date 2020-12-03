<?php

namespace App\Http\Controllers;

use App\Models\Crime;
use App\Models\AireProtegee;
use App\Models\Espece;
use App\Models\Pay;
use App\Models\Unite;
use Illuminate\Support\Str;

use Illuminate\Http\Request;

class CrimeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        
        return view('pages.backoffice.crimes.index', []);
    }

  
    public function create()
    {
      
        return view('pages.backoffice.crimes.create', [
            'pays'                           => Pay::all(),
            'unites'                         => Unite::all(),
            'especes'                        => Espece::all(), 
            'aires'                          => AireProtegee::all()

        ]);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateRules = [];
        $previousUrl = str_replace(url('/'), '', url()->previous());
        $step = $request->step;

           switch($step){
               case 1:
                   # code...
                   $crime = new Crime;
                   $data =  $request->validate([
                    'date_apprehension'                     => ['date','required'],
                    'pays_apprehension'                     => ['required','integer'],
                    'latitude'                              => ['nullable','string','max:255','min:8'],
                    'localite_apprehension'                 => ['required','string','max:255','min:3'],
                    'longitude'                             => ['nullable','string','max:255','min:8'],
                    'espece_id'                             => ['required','integer'],
                    'services_investigateurs'               => ['required','integer'],
                    ]);
                    $crime->date_apprehension               = $request->date_apprehension;
                    $crime->pays_apprehension               = $request->pays_apprehension;
                    $crime->services_investigateurs         = $request->services_investigateurs;
                    $crime->latitude                        = $request->latitude;
                    $crime->localite_apprehension           = $request->localite_apprehension;
                    $crime->longitude                       = $request->longitude;
                    $crime->espece_id                       = $request->espece_id;
                    $crime->uuid                            = Str::uuid();
                    $crime->save();
                    return $request->uuid = $crime->uuid;
                   break;
                case 2:
                    # code...
                    if ($request->uuid ){
                        $crime = Crime::where('uuid',$request->uuid)->first();
                        $data =  $request->validate([
                        'pays_origine_produit'                          => ['required','integer'],
                        'pays_destination'                              => ['required','integer'],
                        'aire_protegee_id'                              => ['nullable','integer'],
                        'date_abattage'                                 => ['required','date'],
                        
                        ]);
                        $crime->pays_origine_produit                    = $request->pays_origine_produit;
                        $crime->pays_destination                        = $request->pays_destination;
                        $crime->aire_protegee_id                        = $request->aire_protegee_id;
                        $crime->date_abattage                           = $request->date_abattage;
                        
                        
                        $crime->save();
                        return $request->uuid = $crime->uuid;

                    }else{

                        abort(404 ,'Les données fournies sont incorrectes ou incompletes');
                    }
                    break;
                case 3:
                    # code...
                    if ($request->uuid){

 
                        $crime = Crime::where('uuid',$request->uuid)->first();
                        $data =  $request->validate([
                        'lien_terrorisme'                          => ['required','integer'],
                        'veto'                                     => ['required','integer'],
                        'victime'                                  => ['nullable','string','max:255','min:3'],
                                                
                        ]);
                        $crime->lien_terrorisme                         = $request->lien_terrorisme;
                        $crime->veto                                    = $request->veto;
                        $crime->victime                                 = $request->victime;
                        
                        $crime->save();
                        

                    }else{

                        abort(404 ,'Les données fournies sont incorrectes ou incompletes');
                    }
                    break;

           }


       
                


                
           
                


                
           
            
            

       


        

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Crime  $crime
     * @return \Illuminate\Http\Response
     */
    public function show(Crime $crime)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Crime  $crime
     * @return \Illuminate\Http\Response
     */
    public function edit(Crime $crime)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Crime  $crime
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Crime $crime)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Crime  $crime
     * @return \Illuminate\Http\Response
     */
    public function destroy(Crime $crime)
    {
        //
    }
}
