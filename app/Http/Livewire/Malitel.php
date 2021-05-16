<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Sms;


class Malitel extends Component
{   
    public $sms;
    public $toggle;


   
    public function toggler(){
        $sms=Sms::where('id',$this->sms->id)->first();
        $sms->malitel =$this->sms->malitel== true ? false : true;
        $sms->save();
    }
    public function render()
    {
        return view('livewire.malitel');
    }
}
