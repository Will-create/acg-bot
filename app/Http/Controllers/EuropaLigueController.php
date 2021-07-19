<?php

namespace App\Http\Controllers;

use App\Models\EuropaLigue;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;

class EuropaLigueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $titrePage = "Les  messages";
        return view('/servicefoots.europaligue.index', compact( 'titrePage'));
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
        $request->validate([
            'content' => 'nullable',
            'modifier' => 'nullable',
            'user_id' => 'nullable',
        ]);
 
        $insert = [
            'content'  => $request->content,
            'modifier' => $request->content,
            'slug'     => str::slug('les messages'),
            'user_id'  => $request->user_id,
        ];
        try {
            
        return response()->json(['success' => true, 'value'=>Message::insertGetId($insert)]);

        } catch (\Throwable $th) {
            return response()->json(['success' => $th]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EuropaLigue  $europaLigue
     * @return \Illuminate\Http\Response
     */
    public function show(EuropaLigue $europaLigue)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EuropaLigue  $europaLigue
     * @return \Illuminate\Http\Response
     */
    public function edit(EuropaLigue $europaLigue)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EuropaLigue  $europaLigue
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EuropaLigue $europaLigue)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EuropaLigue  $europaLigue
     * @return \Illuminate\Http\Response
     */
    public function destroy(EuropaLigue $europaLigue)
    {
        //
    }
}
