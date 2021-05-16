<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Sms;


class Telecel extends Component
{   
    public $sms;
    public $toggle;
    public function toggler(){
        $sms=Sms::where('id',$this->sms->id)->first();
        $sms->telecel =$this->sms->telecel== true ? false : true;
        $sms->save();
    }
    public function render()
    {
        return view('livewire.telecel');
    }
}
