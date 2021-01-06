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
            'nom'                       => ['required', 'string', 'max:255'],
            'prenom'                    => ['required', 'string', 'max:255'],
            'genre'                     => ['required', 'string', 'max:255'],
            'type'                      => ['required', 'string', 'max:255'],
            'travail'                   => ['required', 'string', 'max:255'],
            'date_naiss'                => ['required', 'date',   'max:255'],
            'nationalite'               => ['required', 'string', 'max:255'],
            'revenue'                   => ['required', 'integer', 'max:255'],
            'tel'                       => ['string', 'min:8', 'max:20'],
            'education'                 => ['required', 'string', 'email', 'max:255'],
            'voyageur_international'    => ['required','integer'],
            'pays_id'                   => ['required','integer'],
            'localite_id'               => ['required','integer'],
            'affaire_judiciaire'        => ['required','text'],
          ]);
          $auteur= new CrimeAuteur();
          $auteur->nom=$data['nom'];
          $auteur->prenom=$data['prenom'];
          $auteur->genre=$data['genre'];
          $auteur->travail=$data['travail'];
          $auteur->type=$data['type'];
          $auteur->date_naiss =$data['date_naiss'];
          $auteur->nationalite =$data['nationalite'];
          $auteur->revenue =$data['revenue'];
          $auteur->tel =$data['tel'];
          $auteur->education =$data['education'];
          $auteur->voyageur_international =$data['voyageur_international'];
          $auteur->affaire_judiciaire =$data['affaire_judiciaire'];
          $auteur->pays_id =$data['pays_id'];
          $auteur->localite_id =$data['localite_id'];
          $auteur->crime_id =$data['crime_id'];
          $auteur->uuid=Str::uuid();
          $auteur->save();
          $request->session()->flash('status', 'Commentaire ajouté avec succès !');
          return redirect()->route('commentaires.show',$auteur->uuid);
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

    public function edit(Commentaire $auteur)
    {
        return view('pages.backoffice.commentaires.createdit', [
            'commentaire'      =>$auteur,
            'crimes'      =>Crime::all(),
            'destinataires' =>U::with('role')->get(),
            'titrePage' => "Mise à jour ",
            'btnAction' => "Mettre à jour"
        ]);
    }
    
 
    public function update(Request $request, Commentaire $auteur)
    {
        $data=request()->validate([
            'commentaire'=> ['required','string','max:255','min:3'],
            'pour'=> ['required','integer'],
            'crime_id'=> ['required','integer']
          ]);
          $auteur->pour=$data['pour'];
          $auteur->commentaire=$data['commentaire'];
          $auteur->par=Auth()->user()->id;
          $auteur->crime_id =$data['crime_id'];
          $auteur->uuid=Str::uuid();
          $auteur->save();
         $request->session()->flash('status','Mise à jours du commentaire effectuée avec succès !');
          return redirect()->route('commentaires.show', $auteur->uuid);
    }
    public function destroy(Request $request, Commentaire $auteur)
    {
        $auteur->delete();
        return redirect()->route('commentaires.index')->with('status','Commentaire supprimé avec succès');
        
    }
    
}
