<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Competition;

class Servicefoot extends Component
{
    public $competition;
    public $toggle;


   
    public function toggler(){
        $competition=Competition::where('id',$this->competition->id)->first();
        $competition->caches =$this->competition->caches== true ? false : true;
        $competition->save();
    }

    public function render()
    {
        return view('livewire.servicefoot');
    }
}
