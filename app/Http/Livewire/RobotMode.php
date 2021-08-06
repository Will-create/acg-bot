<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class RobotMode extends Component
{
    public $mode;
    public function toggler(){
        $response = Http::get('http://213.246.56.170:8003/api/acgbot/mode/auto/')->json();
        $this->mode = $response['success'];
    } 
    public function mount(){
        $response = Http::get('http://213.246.56.170:8003/api/acgbot/mode/status/')->json();
        $this->mode = $response['success'];
    }
    public function render()
    {
        return view('livewire.robot-mode');
    }
}
