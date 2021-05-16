<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Sms;


class Onatel extends Component
{   
    public $sms;
    public $toggle;


   
    public function toggler(){
        $sms=Sms::where('id',$this->sms->id)->first();
        $sms->onatel =$this->sms->onatel== true ? false : true;
        $sms->save();
    }
    public function render()
    {
        return view('livewire.onatel');
    }
}
