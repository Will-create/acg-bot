<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\Commentaire as Com;
use Illuminate\Support\Facades\Auth;

class Commentaire extends Component
{
    public $message;
    public $commentaire;
    public $commentaires;

    public $message_id;
    protected $rules = [
        'commentaire' => 'required|min:3',
        'message_id' => 'required'
    ];
    public function vider(){
        $this->commentaire = "";
    }
    public function mount()
    {
        $this->message_id = $this->message->id;

    }

    public function submit()
    {
        $this->validate();
        Com::create([
            'commentaire' => $this->commentaire,
            'uuid' => Str::uuid(),
            'sms_id' => $this->message_id,
            'par' => Auth::user()->id,
        ]);
        $this->vider();
        $this->dispatchBrowserEvent('contentChanged');
        $this->emit('rafraichir'.$this->message->id,$this->message->id);
        
    }

    public function render()
    {
        $this->dispatchBrowserEvent('contentChanged');

        return view('livewire.commentaire');
    }
}
