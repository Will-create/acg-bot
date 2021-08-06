<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Crime as Crm;


class Validate extends Component
{
    public $crime;


   
    public function toggler(){
        $crime=Crm::where('id',$this->crime->id)->first();

        $crime->valide =$this->crime->valide == 0 ? 1 : 0;
        $crime->veto =$this->crime->veto == 0;

        $crime->save();
        $this->crime = $crime;
        
    }
    public function render()
    {
        return view('livewire.validate');
    }
}

