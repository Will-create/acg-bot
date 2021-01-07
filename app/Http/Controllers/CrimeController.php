<?php

namespace App\Http\Controllers;

use App\Models\Crime;
use App\Models\AireProtegee;
use App\Models\Espece;
use App\Models\Pay;
use App\Models\TypeCrime;
use App\Models\Unite;
use Illuminate\Support\Str;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CrimeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('pages.backoffice.crimes.index', ['crimes'  => Crime::all()]);
    }


    public function create()
    {
        return view('pages.backoffice.crimes.create'
        ,[
            'pays'                           => Pay::all(),
            'unites'                         => Unite::all(),
            // 'especes'                        => Espece::all(),
            'typeCrimes'                     => TypeCrime::all(),
            'aires'                          => AireProtegee::all()
        ]
    );

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
        $data =  $request->validate([
            'date_apprehension'                     => ['date','required'],
            'localite_apprehension'                 => ['required','string','max:255','min:3'],
            'latitude'                              => ['nullable','string','max:255','min:8'],
            'longitude'                             => ['nullable','string','max:255','min:8'],
            'espece'                                => ['required','integer'],
            'pays_origine_produit'                          => ['required','integer'],
            'pays_destination'                              => ['required','integer'],
             ]);
             $crime = new Crime;
             $crime->type_crime_id                   = $request->type_id;
             $crime->date_apprehension               = $request->date_apprehension;
             $crime->pays_apprehension               = Auth::user()->pay->id;
             $crime->services_investigateurs         = Auth::user()->unite->id;
             $crime->latitude                        = $request->latitude;
             $crime->localite_apprehension           = $request->localite_apprehension;
             $crime->longitude                       = $request->longitude;
             $crime->espece_id                          = $request->espece;
             $crime->uuid                            = Str::uuid();
             $crime->save();
            $request->session()->flash('status', 'Informations enregistrées avec succès');
             return response()->json(['data' => $crime]);



           switch($step){
               case 1:
                    $crime = new Crime;
                    $crime->uuid                            = Str::uuid();
                    $crime->type_crime_id                   = $request->type_id;
                    $crime->date_apprehension               = $request->date_apprehension;
                    $crime->pays_apprehension               = Auth::user()->pay->id;
                    $crime->services_investigateurs         = Auth::user()->unite->id;
                    $crime->latitude                        = $request->latitude;
                    $crime->localite_apprehension           = $request->localite_apprehension;
                    $crime->longitude                       = $request->longitude;
                    $crime->espece_id                          = $request->espece;
                    $crime->pays_origine_produit                    = $request->pays_origine_produit;
                    $crime->pays_destination                        = $request->pays_destination;
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
    public function show( $crimeUuid)
    {

        return view('pages.backoffice.crimes.show',
        ['crime'  => Crime::where('uuid', $crimeUuid)->first()
        ]);
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
