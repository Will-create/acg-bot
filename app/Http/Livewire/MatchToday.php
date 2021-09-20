<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Competition;
use Illuminate\Support\Facades\Http;
use PhpParser\Node\Stmt\Foreach_;

class MatchToday extends Component
{
    public $competitions = [];



    public function mount(){
        $key = get_apikey();
        $secret = get_apisecret();
        $competitions = Competition::all();
        foreach ($competitions as  $competition) {
           $competition_id = $competition->competition_id;
            $comp = [];
           $url = 'https://livescore-api.com/api-client/fixtures/matches.json?&key='.$key.'&secret='.$secret.'&competition_id='.$competition_id.'&date=today';
           $matchs = Http::get($url);
           $matchs = json_decode($matchs,true);
        //    dd($matchs);
           foreach ($matchs['data']['fixtures'] as $match) {
               $flag1 = Http::get('https://livescore-api.com/api-client/countries/flag.json?&key='.$key.'&secret='.$secret.'&team_id='.$match['home_id']);
               $flag2 = Http::get('https://livescore-api.com/api-client/countries/flag.json?&key='.$key.'&secret='.$secret.'&team_id='.$match['away_id']);
               $match['home_flag'] = $flag1->status() == 500 ? 0 : $flag1->body() ;
               $match['away_flag'] = $flag2->status() == 500 ? 0 : $flag1->body() ;
               $comp[]=$match;
           }
           $competition['matchs']=$comp;
           count($comp) > 0 ? $this->competitions[]=$competition : 0 ;
        }
    }
    public function render()
    {
        return view('livewire.match-today');
    }
}
