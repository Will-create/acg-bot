<?php

namespace App\Http\Controllers;

use App\Models\ConditionProduit;
use Illuminate\Http\Request;

class ConditionProduitController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ConditionProduit  $conditionProduit
     * @return \Illuminate\Http\Response
     */
    public function show(ConditionProduit $conditionProduit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ConditionProduit  $conditionProduit
     * @return \Illuminate\Http\Response
     */
    public function edit(ConditionProduit $conditionProduit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ConditionProduit  $conditionProduit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ConditionProduit $conditionProduit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ConditionProduit  $conditionProduit
     * @return \Illuminate\Http\Response
     */
    public function destroy(ConditionProduit $conditionProduit)
    {
        //
    }
}
