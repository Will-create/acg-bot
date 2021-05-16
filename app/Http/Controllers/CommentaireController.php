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
        $commentaires=Commentaire::orderBy('commentaire','asc')->with('auteur','sms')->get();
        $titrePage = "Liste de tous les commentaires";

        return view('pages.backoffice.commentaires.index',compact('commentaires','titrePage'));
    }
    

    public function show(Commentaire $commentaire)
    {
        return view('pages.backoffice.commentaires.show',[
            'commentaire'   => $commentaire,
            'autres'   =>Commentaire::where('sms_id',$commentaire->sms->id)->get(),
            'titrePage' => "Détails d'un commentaire"
        ]);
    }
   
   
    public function destroy(Request $request, Commentaire $commentaire)
    {
        $commentaire->delete();
        return redirect()->route('commentaires.index')->with('status','Commentaire supprimé avec succès');
        
    }
    
}
