<?php

namespace Database\Seeders;

// use App\Models\Message;

use Illuminate\Database\Seeder;

class Message extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    private $messages = [
        "Ceci vient de vore operateur telecel la mtéo à prévu une trèes forte pluie avec des vent très violent merci de vous protéger en cas de pluie"
    ];
    public function run()
    {
        $messages = Message::all();

        for ($i=0; $i <5; $i++) { 
            for( $j=0; $j<count($this->messages);$j++){
                Message::create([
                    'content' => $this->messages[$j],
                ]);       
            }
        }
    }
}
