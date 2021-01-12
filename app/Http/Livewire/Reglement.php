<?php

namespace App\Http\Livewire;

use App\Models\crimeTypeReglement;
use App\Models\DecisionJustice;
use App\Models\ModeReglement;
use Livewire\Component;

class Reglement extends Component
{
    public $modeReglements;
    public $suites;
    public $reglement;
    public $crime;
    public $amende;
    public $auteur;
    public $suite;

    protected $rules = [
        'reglement' => 'required',
        'suite' => 'nullable',
        'auteur' => 'required',
        'amende' => ['nullable', 'numeric', 'min:100', 'max:500000000'],
    ];
     public function render()
    {
        $mode = null;
        $decision = null;
        $displaySuite = false;
        $displayAmende = false;
        if(!empty($this->reglement)) {
        $mode = ModeReglement::where('id', $this->reglement)->first();
        }
        if(!empty($this->suite)) {
        $decision = DecisionJustice::where('id', $this->suite)->first();
        }
        if($mode && $mode->mode == "Poursuite judiciaire")
        {
            $displaySuite = true;
        }
        if(($mode && $mode->mode == "Transaction forestière") || ($decision && $decision->decision == "Condamnation du prévenu à une amende"))
        {
            $displayAmende = true;
        }

        return view('livewire.reglement',
    [
        'displaySuite' => $displaySuite,
        'displayAmende' => $displayAmende
    ]);
    }

    public function submit()
    {
        $this->validate();

        // Execution doesn't reach here if validation fails.

        crimeTypeReglement::create([
            'mode_id' => $this->reglement,
            'suite_id' => $this->suite,
            'crime_id' => $this->crime->id,
            'auteur_id' => $this->auteur,
            'amende' => $this->amende,
        ]);
        session()->flash('reglement', 'Règlement ajouté avec succès');
        session()->flash('section', 'reglement');
        return redirect()->route('crimes.show', $this->crime->uuid);

    }
}
