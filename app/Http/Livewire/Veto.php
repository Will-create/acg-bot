<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Crime as Crm;


class Veto extends Component
{   
    public $crime;
    public $toggle;


   
    public function toggler(){
        $crime=Crm::where('id',$this->crime->id)->first();

        $crime->veto =$this->crime->veto == 0 ? 1 : 0;
        $crime->save();
        $this->crime = $crime;
        
    }
    


    public function render()
    {
        return view('livewire.veto');
    }
}
