<?php

namespace App\Http\Controllers;

use App\Models\Config;
use App\Models\Date;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;



class ConfigController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $configs = Config::with('edition')->get();
        $editions = Date::all();
        $url = 'http://213.246.56.170:8020/api/servicefoot/listDataSource/';
        $sources = Http::get($url);
        $sources = json_decode($sources,true);
        $modal = "false";
        return view('servicefoots.configs.index', compact('configs', 'sources', 'editions','modal'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //   dd($request);
        $data = request()->validate([
            'onglet'                       => ['string',],
            'edition_id'                       => ['integer',],
            'heure_envoie'                       => ['string'],
            'automatique'                       => ['integer'],
        ]);
        $config = new Config();
        $config->onglet = $data['onglet'];
        $config->edition_id = $data['edition_id'];
        $config->heure_envoie = $data['heure_envoie'];
        $config->connecte = true;
        // $config->power = true;
        $config->uuid = Str::uuid();
        $url = 'http://213.246.56.170:8020/api/servicefoot/updateDataSource/';
        $res = Http::put($url,json_encode($config));
        $config->save();
        $request->session()->flash('status', 'Liaison créée avec succès!!!');
        return redirect()->route('liaisons.show', $config->uuid);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Config  $config
     * @return \Illuminate\Http\Response
     */
    public function show($uuid)
    {
        $config = Config::where('uuid',$uuid)->first();
        return view('servicefoots.configs.show',compact('config'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Config  $config
     * @return \Illuminate\Http\Response
     */
    public function edit(Config $config)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Config  $config
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Config $config)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Config  $config
     * @return \Illuminate\Http\Response
     */
    public function destroy(Config $config)
    {
        //
    }
}
