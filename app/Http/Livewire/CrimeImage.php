<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\CrimeImage as Img;
use Livewire\WithFileUploads;



class CrimeImage extends Component
{
    use WithFileUploads;
    public $crime;
    public $photos = [];
    public $nbrphotos ;
    // public $images;
    public $crime_id;
    protected $rules = [
        'photos' => 'required',
        'crime_id' => 'required'
    ];
    // public function vider(){
    //     $this->images = "";
    // }
    public function mount()
    {
        $this->crime_id = $this->crime->id;
    }
    public function submit()
    {
        $this->validate();
        foreach ($this->photos as $index => $item) {
            $img = new Img();
            $file = $item;
            $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
            $name = $timestamp . '-' . $file->getClientOriginalName();
            $photoPath = $file->storeAs('photo_uploads', $name, 'public');
            $img->chemin = $photoPath;
            $img->uuid = Str::uuid();
            $img->crime_id = $this->crime_id;
            $img->save();
        }
        $this->nbrphotos = count(Img::where('crime_id',$this->crime_id)->get());
        $this->photos = [];
        $this->emit('rafraichissement', $this->crime->id);
    }
    public function render()
    {
        return view('livewire.crime-image');
    }
}
