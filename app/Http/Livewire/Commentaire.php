<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\Commentaire as Com;
use Illuminate\Support\Facades\Auth;

class Commentaire extends Component
{
    public $crime;
    public $commentaire;
    public $commentaires;

    public $crime_id;
    protected $rules = [
        'commentaire' => 'required|min:3',
        'crime_id' => 'required'
    ];
    public function vider(){
        $this->commentaire = "";
    }
    public function mount()
    {
        $this->crime_id = $this->crime->id;

    }

    public function submit()
    {
        $this->validate();
        Com::create([
            'commentaire' => $this->commentaire,
            'uuid' => Str::uuid(),
            'crime_id' => $this->crime_id,
            'par' => Auth::user()->id,
        ]);
        $this->vider();
        $this->emit('rafraichir',$this->crime->id);
        $this->dispatchBrowserEvent('refresh-accordeon');
        
    }

    public function render()
    {
        $this->dispatchBrowserEvent('contentChanged');

        return view('livewire.commentaire');
    }
}
