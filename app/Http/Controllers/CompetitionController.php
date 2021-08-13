<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Competition;
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
    public function testShow(){
        return view('/servicefoots.competition.show');
    }
    public function store(Request $request)
    {
        $data = request()->validate([
            'competition'                       => [ 'string', 'min:3'],
            'federation'                       => [ 'string'],
            'description'                           =>  [ 'string'],
			
        ]);
        $competition = new Competition();
        $competition->competition = mb_strtoupper($data['competition']);
        $competition->federation = mb_strtoupper($data['federation']);
        $competition->description = mb_strtoupper($data['description']);
        $competition->uuid = Str::uuid();
		
        $competition->save();
        return back();
    }
}
