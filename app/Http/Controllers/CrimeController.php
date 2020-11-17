<?php

namespace App\Http\Controllers;

use App\Models\Crime;
use App\Models\crimeTypeReglement;
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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pays = Pay::all();
        $unites = Unite::all();
        $crime_type_reglements = crimeTypeReglement::all();
        return view('pages.backoffice.crimes.create', compact('pays', 'unites', 'crime_type_reglements'));
        
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


        if ($request->ajax()) {
            if ($step ==  1) {
                $data =  $request->validate([
                    'date_apprehension'                     => 'required',
                    'pays_appréhension'                     => 'required',
                    'latitude'                              => 'nullable',
                    'localite_aprrehension'                 => 'required',
                    'longitude'                             => 'nullable',
                    'espece'                                => 'nullable',
                ]);


                session([
                    'date_apprehension'                         => $request->date_apprehension,
                    'pays_appréhension'                         => $request->pays_appréhension,
                    'latitude'                                  => $request->latitude,
                    'localite_aprrehension'                     => $request->localite_aprrehension,
                    'longitude'                                 => $request->longitude,
                    'espece'                                    => $request->espece,
                ]);
            } else if ($step == 2) {
                $data =  $request->validate([
                    'pays_origine_produit'                          => 'required',
                    'pays_destination'                              => 'required',
                    'aire_protegee_id'                              => 'nullable',
                    'date_abattage'                                 => 'required',
                    'crime_type_reglement'                          => 'nullable',
                    'crime_type_suite'                              => 'nullable',
                    'penalite'                                      => 'nullable',
                ]);


                session([
                    'pays_origine_produit'                          => $request->pays_origine_produit,
                    'pays_destination'                              => $request->pays_destination,
                    'aire_protegee_id'                              => $request->aire_protegee_id,
                    'date_abattage'                                 => $request->date_abattage,
                    'crime_type_reglement'                          => $request->crime_type_reglement,
                    'crime_type_suite'                              => $request->crime_type_suite,
                    'penalite'                                      => $request->penalite,
                ]);
            }
            $data = $request->session()->all();
            return response()->json($data);

        }


        abort(404);

        // Crime::create([
        //     'date_apprehension'                     => $request->date_apprehension,
        //     'pays_appréhension'                     => $request->pays_appréhension,
        //     'latitude'                              => $request->latitude,
        //     'localite_aprrehension'                 => $request->localite_aprrehension,
        //     'longitude'                             => $request->longitude,
        //     'espece'                                => $request->espece,
        // ]);
        // return response ()->json ();
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
