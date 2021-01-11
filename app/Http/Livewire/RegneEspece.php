<?php

namespace App\Http\Livewire;

use App\Models\Crime;
use App\Models\CrimeEspece;
use App\Models\Espece;
use Illuminate\Support\Str;

use Livewire\Component;

class RegneEspece extends Component
{
    public $regne;
    public $especes = [];
    public $espece;
    public $pays;
    public $unites;
    public $typeCrimes;
    public $aires;
    public $crime_id;
    public $crime;

    public function mount() {
    $this->crime_id = $this->crime->id;
    $this->espece = $this->espece;
    }
    protected $rules = [
        'espece' => 'required',
        'crime_id' => 'required',
    ];
    public function render()
    {
        if(!empty($this->regne)) {
            $this->especes = Espece::where('regne', $this->regne)->get();
            $this->dispatchBrowserEvent('contentChanged');
        }
        $crime = Crime::where('id', $this->crime_id)->get();
        return view('livewire.regne-espece',
        [
            'especes' => $this->especes,
             'crimeEspeces' =>  CrimeEspece::latest()->where('crime_id', $this->crime_id)->get()

        ]);
    }

    public function submit()
    {
        $this->validate();

        // Execution doesn't reach here if validation fails.

        CrimeEspece::create([
            'uuid'       => Str::uuid(),
            'crime_id' => $this->crime_id,
            'espece_id' => $this->espece,
        ]);
        $this->regne = "";
        $this->espece = "";
        session()->flash('status', 'Espèce ajoutée avec succès');

    }
}
