<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Date;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class DateController extends Controller
{
  public function index()
  {
    return view('/servicefoots.competition.show');
  }
  public function store(Request $request)
  {
    //   dd($request);
    $data = request()->validate([
      'designation'                       => ['string',],
      'date_debut'                       => ['date',],
      'date_fin'                       => ['date'],
      'competition_id'                       => ['integer'],
      'competition_uuid'                       => ['nullable'],
    ]);
    $date = new Date();
    $date->designation = mb_strtoupper($data['designation']);
    $date->date_debut = mb_strtoupper($data['date_debut']);
    $date->date_fin = mb_strtoupper($data['date_fin']);
    $date->competition_id = $data['competition_id'];
    $date->uuid = Str::uuid();
    $date->save();
    $request->session()->flash('status', 'Edition créée avec succès!!!');
    return redirect()->route('competitions.show', $data['competition_uuid']);
  }
}
