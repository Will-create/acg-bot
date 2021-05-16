<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Commentaire as Com;


class Comment extends Component
{

    public $message;
    public $idAccordion = 'accordion';
    public $head = 'acc_head';
    public $content = 'acc_content';
    public $section = 'acc_section';
    public $commentaires;
    public $listen;
    public $listeners = [
        'rafraichir' => 'rafraichissement',
    ];
    public function mount(){
    $this->idAccordion = 'accordion'.$this->message->id;
    $this->head = 'acc_head'.$this->message->id;
    $this->content = 'acc_content'.$this->message->id;
    $this->section = 'acc_section'.$this->message->id;
    $this->listeners = [
        'rafraichir'.$this->message->id => 'rafraichissement',
    ];
    }
    public function rafraichissement ($id){
        
        $this->commentaires=Com::where('sms_id',$id)->orderBy('created_at','desc')->get();
        session()->flash('commentaire', 'Commentaire ajoutée avec succès');
        session()->flash('section', 'commentaire');
    }
    public function render()
    {
        return view('livewire.comment');
    }
}
