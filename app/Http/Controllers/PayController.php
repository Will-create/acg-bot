<?php

namespace App\Http\Controllers;

use App\Models\Pay;
use App\Models\Ville;
use Illuminate\Http\Request;

class PayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pays=Pay::all();
        return view('pages.backOffice.pays.list', compact('pays'));
    }

   
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pay  $pay
     * @return \Illuminate\Http\Response
     */
    public function show(Pay $pay)
    {
        $villes=Ville::where('pays_id',$pay->id)->get();
        return view('pages.backOffice.pays.index', compact('pay','villes'));
    }

    
}
