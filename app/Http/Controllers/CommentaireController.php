<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Crime;
use App\Models\User as U;
use App\Models\Commentaire;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CommentaireController extends Controller
{
    public function __construct()
    {
        
    }
    public function index()
    {
        $commentaires=Commentaire::orderBy('commentaire','asc')->with('auteur','destinataire','crime')->get();
        $titrePage = "Liste de tous les commentaires";

        return view('pages.backoffice.commentaires.index',compact('commentaires','titrePage'));
    }
    public function create()
    {
        return view('pages.backoffice.commentaires.createdit', [
            'commentaire' => new Commentaire(),
            'destinataires' =>U::with('role')->get(),
            'crimes' => Crime::all(),
            'titrePage' => "Ajout d'un nouveau commentaire",
            'btnAction' => "Commenter"
        ]);
    }
    public function store(Request $request)
    {
        $data=request()->validate([
            'commentaire'=> ['required','string','max:255','min:3'],
            'pour'=> ['required','integer'],
            'crime_id'=> ['required','integer']
          ]);
          $commentaire= new Commentaire();
          $commentaire->pour=$data['pour'];
          $commentaire->commentaire=$data['commentaire'];
          $commentaire->par=Auth()->user()->id;
          $commentaire->crime_id =$data['crime_id'];
          $commentaire->uuid=Str::uuid();
          $commentaire->save();
          $crime = Crime::where('id',$commentaire->crime_id)->first();
          $request->session()->flash('status', 'Commentaire ajouté avec succès !');
          return redirect()->route('crimes.show',$crime->uuid);
    }
    public function show(Commentaire $commentaire)
    {
        return view('pages.backoffice.commentaires.show',[
            'commentaire'   => $commentaire,
            'autres'   =>Commentaire::where('crime_id',$commentaire->crime->id)->get(),
            'autres'   =>Commentaire::where('crime_id',$commentaire->crime->id)->get(),
            'autres'   =>Commentaire::where('crime_id',$commentaire->crime->id)->get(),
            'titrePage' => "Détails d'un commentaire"
        ]);
    }
    public function filter()
    {  
        $p = 1;
        $crime=Crime::where('id',$p )->first();
        return view('pages.backoffice.commentaires.filter', [
            'commentaires'                    =>Commentaire::where('crime_id',$crime->id)->get(),
            'crimes'                         =>Crime::all(),
            'crime'                          =>$crime,
            'titrePage'                      => "Liste des commentaires par crime"

        ]);
    }
    public function filtreur($p)
    {  
        $crime=Crime::where('id',$p )->first();
        return response()->json([
            'commentaires'                   => Commentaire::where('crime_id',$crime->id)->with('auteur','destinataire','crime')->get(),
            'crimes'                         =>Crime::all(),
            'roles'                          =>Role::all(),
            'crime'                          =>$crime,
            'titrePage' => "Liste des commentaires par crime"

        ]);
    }
    public function edit(Commentaire $commentaire)
    {
        return view('pages.backoffice.commentaires.createdit', [
            'commentaire'      =>$commentaire,
            'crimes'      =>Crime::all(),
            'destinataires' =>U::with('role')->get(),
            'titrePage' => "Mise à jour d'un commentaire",
            'btnAction' => "Mettre à jour"
        ]);
    }
    public function update(Request $request, Commentaire $commentaire)
    {
        $data=request()->validate([
            'commentaire'=> ['required','string','max:255','min:3'],
            'pour'=> ['required','integer'],
            'crime_id'=> ['required','integer']
          ]);
          $commentaire->pour=$data['pour'];
          $commentaire->commentaire=$data['commentaire'];
          $commentaire->par=Auth()->user()->id;
          $commentaire->crime_id =$data['crime_id'];
          $commentaire->uuid=Str::uuid();
          $commentaire->save();
         $request->session()->flash('status','Mise à jours du commentaire effectuée avec succès !');
          return redirect()->route('commentaires.show', $commentaire->uuid);
    }
    public function destroy(Request $request, Commentaire $commentaire)
    {
        $commentaire->delete();
        return redirect()->route('commentaires.index')->with('status','Commentaire supprimé avec succès');
        
    }
    
}
