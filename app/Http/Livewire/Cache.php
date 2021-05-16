<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Menu;

class Cache extends Component
{
    public $menu;
    public $toggle;


   
    public function toggler(){
        $menu=Menu::where('id',$this->menu->id)->first();
        $menu->cache =$this->menu->cache== true ? false : true;
        $menu->save();
    }
  

    public function render()
    {
        return view('livewire.cache');
    }
}
