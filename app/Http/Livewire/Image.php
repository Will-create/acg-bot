<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\CrimeImage;

class Image extends Component
{
    public $crime;
    public $images;
    protected $listeners = [
        'rafraichissement' => 'refresh',
    ];
    public function mount(){
        $this->images = CrimeImage::where('crime_id', $this->crime->id)->orderBy('created_at', 'desc')->get();
    }
    public function declencheur($id){
        // $this->emit('declencherSuppression', $id);
        $this->dispatchBrowserEvent('declencherSuppression',['id'=>$id]);
    }
    public function refresh($id)
    {
        $this->images = CrimeImage::where('crime_id', $id)->orderBy('created_at', 'desc')->get();
        session()->flash('images', 'Image(s) ajoutée(s) avec succès');
        session()->flash('section', 'images');
    }
    public function supprimer($id){
      $img = CrimeImage::where('id',$id)->first();
      $img->delete();
      $this->emit('refresh', $this->crime->id);
      $this->images = CrimeImage::where('crime_id', $this->crime->id)->orderBy('created_at', 'desc')->get();
      session()->flash('images', 'Image supprimée avec succès');
      session()->flash('section', 'images');
    }
    public function render()
    {
        return view('livewire.image');
    }
}
