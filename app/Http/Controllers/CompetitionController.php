<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Competition;
use App\Models\Date;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class CompetitionController extends Controller
{
    public function index(){
        $competitions = Competition::all();
        return view('/servicefoots.index', compact('competitions'));
    }
    public function ajouter(){
        return view('/servicefoots.competition.ajoutercompetition');
    }
    public function competitionDirect(){
        return view('/servicefoots.competition.competiondirect');
    }
    public function today(){
        return view('/servicefoots.competition.matchtoday');
    }
    public function testShow(){
        $competition = Competition::all();
        return view('/servicefoots.competition.show', compact('competition'));
    }
    public function store(Request $request)
    {
        $data = request()->validate([
            'competition'                       => [ 'string'],
            'competition_id'                       => [ 'integer'],
            'federation'                       => [ 'string'],
            'description'                           =>  [ 'string']
        ]);
        $competition = new Competition();
        $competition->competition = mb_strtoupper($data['competition']);
        $competition->competition_id = $data['competition_id'];
        $competition->federation = mb_strtoupper($data['federation']);
        $competition->description = mb_strtoupper($data['description']);
        // $competition->date_id = $data['date_id'];
        $competition->uuid = Str::uuid();
        $competition->save();
        $request->session()->flash('status','Competition créé avec succès!!!');
          return redirect()->route('competitions.show',$competition->uuid);
    }
    public function show(Request $req,$uuid)
    {
        $competition = Competition::where('uuid',$uuid)->first();
        $dates = Date::where('competition_id',$competition->id)->get();
        return view('/servicefoots.competition.show', compact('competition', 'dates'));
    }
    public function destroy(Request $request, Competition $competition)
    {
        $competition->delete();
        return redirect()->route('competitions.index')->with('status','Compétitions supprimé avec succès');
    }
}
