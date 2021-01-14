<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Commentaire as Com;


class Comment extends Component
{

    public $crime;
    public $idAccordion = 'accordion';
    public $head = 'acc_head';
    public $content = 'acc_content';
    public $section = 'acc_section';
    public $commentaires;
    protected $listeners = [
        'rafraichir' => 'rafraichissement',
    ];
    public function rafraichissement ($id){
        $this->commentaires=Com::where('crime_id',$id)->orderBy('created_at','desc')->get();
        session()->flash('commentaire', 'Commentaire ajoutée avec succès');
        session()->flash('section', 'commentaire');
    }
    public function render()
    {
        return view('livewire.comment');
    }
}
