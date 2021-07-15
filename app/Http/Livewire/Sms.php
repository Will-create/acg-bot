<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Sms as S;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class Sms extends Component
{
    public $sms;
    public $sms_id;
    public $contenu_sortie;
    public $sortie_count;


    protected $rules = [
        'contenu_sortie' => 'required|min:3',
        'contenu_entree' => 'nullable'
    ];
   
    public function mount(){
        $this->contenu_sortie = $this->sms->contenu_sortie;
        $this->sms_id = $this->sms->id;
        $this->sortie_count = count(array($this->sms->contenu_entree));
    }

    public function submit()
    {
        $this->validate();
        $s = S::where('id',$this->sms_id)->first();
        if(!$s)
            return;
        $s->contenu_sortie = $this->contenu_sortie;
        $s->save();
    }
    public function render()
    {
        return view('livewire.sms');
    }
}
