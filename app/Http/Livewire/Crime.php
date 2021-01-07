<?php

namespace App\Http\Livewire;

use App\Models\AireProtegee;
use App\Models\Espece;
use App\Models\Pay;
use App\Models\TypeCrime;
use App\Models\Unite;
use Livewire\Component;
use SebastianBergmann\Environment\Console;

class Crime extends Component
{
    public $regne;
    public $especes = [];
    public $espece;
    public $pays;
    public $unites;
    public $typeCrimes;
    public $aires;

    public function render()
    {
        if(!empty($this->regne)) {
            $this->especes = Espece::where('regne', $this->regne)->get();
        }
        return view('livewire.crime', ['especes' => $this->especes]);

    }
}
