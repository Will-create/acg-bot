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
        $titrePage = "Liste de tous les auteurs de crime";

        return view('pages.backoffice.auteurs.index',compact('auteurs','titrePage'));
    }
    public function create($crime = null)
    {
        return view('pages.backoffice.auteurs.createdit', [
            'auteur' => new CrimeAuteur(),
            'crimes' => Crime::all(),
            'localites' => Localite::all(),
            'pays' => Pay::all(),
            'titrePage' => "Ajout d'un nouvel auteur de crime",
            'btnAction' => "Ajouter",
            'crimeUuid' => $crime
        ]);
    }
    public function store(Request $request)
    {
        $data=request()->validate([
            'nom'                       => ['required', 'string', 'max:255'],
            'prenom'                    => ['required', 'string', 'max:255'],
            'adresse'                    => ['required', 'string', 'max:500'],
            'genre'                     => ['required', 'string', 'max:255'],
            'type'                      => ['required', 'string', 'max:255'],
            'travail'                   => ['required', 'string', 'max:255'],
            'date_naiss'                => ['required', 'date',   'max:255'],
            'nationalite'               => ['required', 'string', 'max:255'],
            'revenue'                   => ['numeric', 'min:100', 'max:500000000'],
            'education'                 => ['required', 'string'],
            'terrorisme'                 => ['required', 'string'],
            'voyageur_international'    => ['required','integer'],
            'affaire_judiciaire'        => ['nullable','string'],
          ]);
          $crime = Crime::where('uuid', $request->crimeUiid)->first();
          $auteur= new CrimeAuteur();
          $auteur->uuid=Str::uuid();
          $auteur->nom=$data['nom'];
          $auteur->prenom=$data['prenom'];
          $auteur->genre=$data['genre'];
          $auteur->travail=$data['travail'];
          $auteur->type=$data['type'];
          $auteur->date_naiss =$data['date_naiss'];
          $auteur->nationalite =$data['nationalite'];
          $auteur->revenue =$data['revenue'];
          $auteur->education =$data['education'];
          $auteur->voyageur_international =$data['voyageur_international'];
          $auteur->affaire_judiciaire =$data['affaire_judiciaire'];
          $auteur->adresse =$data['adresse'];
          $auteur->terrorisme =$data['terrorisme'];
          $auteur->crime_id =$crime->id;
          $auteur->save();
          $request->session()->flash('auteur', 'Auteur ajouté avec succès');
          $request->session()->flash('section', 'auteur');

          return redirect()->route('crimes.show',$crime->uuid);
    }
    public function show( $auteurUuid)
    {
        $auteur = CrimeAuteur::where('uuid', $auteurUuid)->first();
        return view('pages.backoffice.auteurs.createdit',[
            'auteur'   => $auteur,
            'autres'   =>CrimeAuteur::where('crime_id',$auteur->crime_id)->get(),
            'titrePage'     => 'Mise à jour '. $auteur->nom . ' ' . $auteur->prenom,
            'btnAction'         => 'Mise à jour',
            'crimeUuid'         => null
        ]);
    }

    public function filter()
    {
        $p = 1;
        $crime=Crime::where('id',$p )->first();
        return view('pages.backoffice.commentaires.filter', [
            'commentaires'                    =>CrimeAuteur::where('crime_id',$crime->id)->get(),
            'crimes'                         =>Crime::all(),
            'titrePage' => "Ajout d'un nouvel auteur de crime",
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


    public function update(Request $request,  $auteurUuid)
    {
        // dd($request->all());
        $data=request()->validate([
            'nom'                       => ['required', 'string', 'max:255'],
            'prenom'                    => ['required', 'string', 'max:255'],
            'adresse'                  => ['nullable', 'string', 'max:500'],
            'genre'                     => ['required', 'string', 'max:255'],
            'type'                      => ['required', 'string', 'max:255'],
            'travail'                   => ['required', 'string', 'max:255'],
            'date_naiss'                => ['required', 'date',   'max:255'],
            'nationalite'               => ['required', 'string', 'max:255'],
            'revenue'                   => ['numeric', 'min:100', 'max:500000000'],
            'education'                 => ['required', 'string'],
            'terrorisme'                => ['required', 'string'],
            'voyageur_international'    => ['required','integer'],
            'affaire_judiciaire'        => ['nullable','string'],
          ]);
          $auteur                                 =CrimeAuteur::where('uuid', $auteurUuid)->first();
          $auteur->nom                            =$data['nom'];
          $auteur->prenom                         =$data['prenom'];
          $auteur->genre                          =$data['genre'];
          $auteur->travail                        =$data['travail'];
          $auteur->type                           =$data['type'];
          $auteur->date_naiss                     =$data['date_naiss'];
          $auteur->nationalite                    =$data['nationalite'];
          $auteur->revenue                        =$data['revenue'];
          $auteur->education                      =$data['education'];
          $auteur->voyageur_international         =$data['voyageur_international'];
          $auteur->affaire_judiciaire             =$data['affaire_judiciaire'];
          $auteur->adresse                        =$data['adresse'];
          $auteur->terrorisme                      =$data['terrorisme'];
          $auteur->update();
          $request->session()->flash('status', 'Auteur ajouté avec succès');
          $request->session()->flash('section', 'auteur');
          return redirect()->route('crimes.show',$auteur->crime->uuid);
    }
    // public function update(Request $request, Commentaire $auteur)
    // {
    //     $data=request()->validate([
    //         'commentaire'=> ['required','string','max:255','min:3'],
    //         'pour'=> ['required','integer'],
    //         'crime_id'=> ['required','integer']
    //       ]);
    //       $auteur->pour=$data['pour'];
    //       $auteur->commentaire=$data['commentaire'];
    //       $auteur->par=Auth()->user()->id;
    //       $auteur->crime_id =$data['crime_id'];
    //       $auteur->uuid=Str::uuid();
    //       $auteur->save();
    //      $request->session()->flash('status','Mise à jours du commentaire effectuée avec succès !');
    //       return redirect()->route('commentaires.show', $auteur->uuid);
    // }
    public function destroy(Request $request,  $auteur)
    {
        $auteur =  CrimeAuteur::where('uuid', $auteur)->first();
        if (count($auteur->reglements) > 0) {
          $request->session()->flash('section', 'auteur');
          $request->session()->flash('error', 'Impossible de supprimer cet enregistrement');
            return redirect()->route('crimes.show', $auteur->crime->uuid);
        }
        $auteur->delete();
        return redirect()->route('crimes.show', $auteur->crime->uuid)->with('status','Auteur supprimer avec succès');

    }
    // public function destroy(Request $request, Commentaire $auteur)
    // {
    //     $auteur->delete();
    //     return redirect()->route('commentaires.index')->with('status','Commentaire supprimé avec succès');

    // }

}
