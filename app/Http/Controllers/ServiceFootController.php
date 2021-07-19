<?php

namespace App\Http\Controllers;

use App\Models\ServiceFoot;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;

class ServiceFootController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        
        $titrePage = "Les  messages";
        return view('/servicefoots.index', compact( 'titrePage'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('servicefoots.index');
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
            'content'           => 'nullable',
            'modifier'          => 'nullable',
            'user_id'           => 'nullable',
            'coupe_du_monde_id' => 'nullable',
            'ligue_champion_id' => 'nullable',
            'user_europa_id'    => 'nullable',
            'euro_id'           => 'nullable',
            'copa_id'           => 'nullable',
            'can_id'            => 'nullable',
        ]);
 
        $insert = [
            'content'            => $request->content,
            'modifier'           => $request->content,
            'slug'               => str::slug('les messages'),
            'user_id'            => $request->user_id,
            'coupe_du_monde_id'  => $request->coupe_du_monde_id,
            'ligue_champion_id'  => $request->ligue_champion_id,
            'europa_id'          => $request->europa_id,
            'euro_id'            => $request->euro_id,
            'copa_id'            => $request->copa_id,
            'can_id'             => $request->can_id,
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
     * @param  \App\Models\ServiceFoot  $serviceFoot
     * @return \Illuminate\Http\Response
     */
    public function show(ServiceFoot $serviceFoot)
    {
        return view('servicefoots.show' ,[
            'message'   => $serviceFoot,
            'par'       =>User::where('user_id',$serviceFoot->users->id)->get(),
            'titrePage' => "Détails d'un message"
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ServiceFoot  $serviceFoot
     * @return \Illuminate\Http\Response
     */
    public function edit(ServiceFoot $serviceFoot)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ServiceFoot  $serviceFoot
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ServiceFoot $serviceFoot)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ServiceFoot  $serviceFoot
     * @return \Illuminate\Http\Response
     */
    public function destroy(ServiceFoot $serviceFoot)
    {
        $serviceFoot->delete();
        return redirect()->route('servicefoot.index')->with('status','message supprimé avec succès');
    }
}
