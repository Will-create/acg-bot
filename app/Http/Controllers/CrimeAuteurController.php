<?php

namespace App\Http\Controllers;

use App\Models\Crime;
use App\Models\Localite;
use App\Models\User as U;
use App\Models\CrimeAuteur;
use App\Models\Pay;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CrimeAuteurController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $auteurs=CrimeAuteur::orderBy('nom','asc')->with('crimes')->get();
        return view('pages.backoffice.auteurs.index',compact('auteurs'));
    }
    public function create()
    {
        return view('pages.backoffice.auteurs.createdit', [
            'auteur' => new CrimeAuteur(),
            'crimes' => Crime::all(),
            'localites' => Localite::all(),
            'pays' => Pay::all(),
            'titrePage' => "Ajout d'un nouvel auteur de crime",
            'btnAction' => "Ajouter"
        ]);
    }
    public function store(Request $request)
    {
        $data=request()->validate([
            'commentaire'=> ['required','string','max:255','min:3'],
            'pour'=> ['required','integer'],
            'crime_id'=> ['required','integer']
          ]);
          $commentaire= new CrimeAuteur();
          $commentaire->pour=$data['pour'];
          $commentaire->commentaire=$data['commentaire'];
          $commentaire->par=Auth()->user()->id;
          $commentaire->crime_id =$data['crime_id'];
          $commentaire->uuid=Str::uuid();
          $commentaire->save();
          $request->session()->flash('status', 'Commentaire ajouté avec succès !');
          return redirect()->route('commentaires.show',$commentaire->uuid);
    }
    
    public function show(CrimeAuteur $auteur)
    {
        return view('pages.backoffice.auteurs.show',[
            'auteur'   => $auteur,
            'autres'   =>CrimeAuteur::where('crime_id',$auteur->crime->id)->get(),
        ]);
    }

    public function filter()
    {  
        $p = 1;
        $crime=Crime::where('id',$p )->first();
        return view('pages.backoffice.commentaires.filter', [
            'commentaires'                    =>CrimeAuteur::where('crime_id',$crime->id)->get(),
            'crimes'                         =>Crime::all(),
            'crime'                          =>$crime
        ]);
    }

    public function filtreur($p)
    {  
        $crime=Crime::where('id',$p )->first();
        
      
        return response()->json([
            'commentaires'                   => CrimeAuteur::where('crime_id',$crime->id)->with('auteur','destinataire','crime')->get(),
            'crimes'                         =>Crime::all(),
            'roles'                          =>Role::all(),
            'crime'                          =>$crime
        ]);
    }

    public function edit(Commentaire $commentaire)
    {
        return view('pages.backoffice.commentaires.createdit', [
            'commentaire'      =>$commentaire,
            'crimes'      =>Crime::all(),
            'destinataires' =>U::with('role')->get(),
            'titrePage' => "Mise à jour ",
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
