<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\CrimeImage;


class CountImage extends Component
{

    public $crime;
    public $crimeImages;


    protected $listeners = [
        'rafraichissement' => 'rafraichir',
        'refresh' => 'rafraichir'

    ];

    public function mount(){
        $this->crimeImages = count(CrimeImage::where('crime_id', $this->crime->id)->orderBy('created_at', 'desc')->get());
    }
    public function rafraichir($id)
    {
        $this->crimeImages = count(CrimeImage::where('crime_id', $id)->orderBy('created_at', 'desc')->get()); 
        
    }
    public function render()
    {
        return view('livewire.count-image');
    }
}
