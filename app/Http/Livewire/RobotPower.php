<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class RobotPower extends Component
{
    public $power;

    public function toggler(){
        $response = Http::get('http://213.246.56.170:8003/api/acgbot/power/')->json();
        $this ->power = $response['success'];
    }
    public function mount(){
        $response = Http::get('http://213.246.56.170:8003/api/acgbot/power/status/')->json();
        $this ->power = $response['success'];
    }
    public function render()
    {
        return view('livewire.robot-power');
    }
}
