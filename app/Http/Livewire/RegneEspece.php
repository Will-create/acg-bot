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
    public $espece_id;
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
        'espece_id' => 'required',
        'crime_id' => 'required',
    ];  
    public function render()
    {
        
        if(!empty($this->regne)) {
            $this->especes = Espece::where('regne', $this->regne)->get();
            $this->dispatchBrowserEvent('refreshSelectize',['especes'=>$this->especes]);
        }
        
        $crime = Crime::where('id', $this->crime_id)->get();
        
        // dd($this->espece);
        
        return view('livewire.regne-espece',
        [
            'especes' => $this->especes,
            'crimeEspeces' =>  CrimeEspece::latest()->where('crime_id', $this->crime_id)->get()
            
            ]);
            
        }
    public function submit()
    {
        $this->validate();
        CrimeEspece::create([
            'uuid'       => Str::uuid(),
            'crime_id' => $this->crime_id,
            'espece_id' => $this->espece_id,
        ]);
        $this->regne = "";
        $this->espece_id = "";
        session()->flash('status', 'Espèce ajoutée avec succès');
    }

    public function delete($id) {
       $crimeEspece = CrimeEspece::where('id', $id)->first();
       $crimeEspece->delete();
       session()->flash('espece', 'Espèce supprimée avec succès');
       session()->flash('section', 'espece');
        return redirect()->route('crimes.show', $crimeEspece->crime->uuid);
    }
}
