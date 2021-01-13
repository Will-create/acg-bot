<?php

namespace App\Http\Livewire;

use App\Models\Localite;
use App\Models\Pay;
use Livewire\Component;

class Localites extends Component
{
    public $localites, $nom, $uuid, $pays_id;

    public function render()
    {
        $this->localites = Localite::all();
        return view('livewire.localites');
    }

    private function resetInputFields(){
        $this->nom = '';
        $this->pays_id = '';
    }
    public function store()
    {
        $validatedDate = $this->validate([
            'nom' => ['required','string','max:255','min:3'],
            'pays_id' => ['required','integer'],
        ]);

        Localite::create($validatedDate);

        session()->flash('message', 'Localité ajoutée avec succès');

        $this->resetInputFields();

        $this->emit('userStore'); // Close model to using to jquery

    }

    public function edit($id)
    {
        $this->updateMode = true;
        $localite = Localite::where('uuid',$id)->first();
        $this->nom = $localite->name;
        $this->pays_id = $localite->email;

    }
    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();


    }

    public function update()
    {
        $validatedDate = $this->validate([
            'nom' => ['required','string','max:255','min:3'],
            'pays_id' => ['required','integer'],
        ]);

        if ($this->uuid) {
        $localite = Localite::where('uuid',$this->uuid)->first();
            $localite->update([
                'nom' => $this->nom,
                'pays_id' => $this->pays_id,
            ]);
            $this->updateMode = false;
            session()->flash('message', 'Localité mise à jour');
            $this->resetInputFields();

        }
    }


}
