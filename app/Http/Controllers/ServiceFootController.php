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
            'user_id'           => 'nullable'
        ]);
 
        $insert = [
            'content'            => $request->content,
            'modifier'           => $request->content,
            'slug'               => str::slug('les messages'),
            'user_id'            => $request->user_id
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
