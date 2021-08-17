<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Competition extends Component
{
    public $competition;
    public $toggle;


   
    public function toggler(){
        $competition=Competition::where('id',$this->competition->id)->first();
        $competition->cache =$this->competition->cache== true ? false : true;
        $competition->save();
    }
  

    public function render()
    {
        return view('livewire.servicefoot');
    }
}
