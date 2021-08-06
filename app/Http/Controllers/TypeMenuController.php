<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Restriction;
use App\Models\TypeMenu;
use Illuminate\Support\Str;
use Illuminate\Http\Request;


class TypeMenuController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }
    public function index()
    {
        $types=TypeMenu::orderBy('nom','asc')->get();
        return view('pages.backoffice.type_menus.index',[
            'types' =>TypeMenu::orderBy('nom','asc')->get(),
            'titrePage' => "Liste de tous les types de menus"
            ]);
    }

    public function create()
    {
        return view('pages.backoffice.type_menus.createdit', [
            'type' => new TypeMenu(),
            'titrePage' => "Ajout d'un nouveau type de menu",
            'btnAction' => "Ajouter"
        ]);
    }

    public function store(Request $request)
    {
        $data=request()->validate([
            'nom'=> ['required','string','max:255','min:3','unique:type_menus'],
            'description'=> ['required','string','max:500','min:3'],
          ]);
          $type= new TypeMenu();
          $type->nom=$data['nom'];
          $type->description=$data['description'];
          $type->uuid=Str::uuid();
          $type->save();
          $request->session()->flash('status', 'Le type de menu "'.$type->nom.'" est ajouté avec succès !');
          return redirect()->route('type_menus.show',$type->uuid);
    }
    public function show($uuid)
    {
        $titrePage = "Liste de tous les types  de menu: ";

        return view('pages.backoffice.type_menus.show',[
            'type'   => TypeMenu::where('uuid',$uuid)->first(),
            'menus' =>Menu::where('type_menu_id',TypeMenu::where('uuid',$uuid)->first()->id)->get(),
            'titrePage' => $titrePage.TypeMenu::where('uuid',$uuid)->first()->nom
        ]);
    }
    public function edit($uuid)
    {
        return view('pages.backoffice.type_menus.createdit', [
            'type'      => TypeMenu::where('uuid',$uuid)->first(),
            'titrePage' => "Mise à jour ".TypeMenu::where('uuid',$uuid)->first()->nom,
            'btnAction' => "Mettre à jour"
        ]);
    }

    public function update(Request $request, $uuid)
    {
        $data=request()->validate([
            'nom'=> ['required','string','max:255','min:3'],
            'description'=> ['required','string','max:500','min:3'],
        ]);
        $type=TypeMenu::where('uuid',$uuid)->first();
        $type->nom=$data['nom'];
        $type->description=$data['description'];
        $type->uuid=Str::uuid();
        $type->save();
        $request->session()->flash('status', 'Type de menus mis à jours avec succès');
        return redirect()->route('type_menus.show', $type->uuid);
    }

    public function destroy(Request $request,$uuid)
    {
        $type=TypeMenu::where('uuid',$uuid)->first();
        $restriction = new Restriction;
        $restrictions = $restriction->check($type->id,[
            ['foreignkey'=>'type_menu_id','modelname'=>'menu'],
        ]);
        if ($restrictions){
        return redirect()->back()->with('danger',$restrictions['message']);
        } else {
            $type->delete();
            return redirect()->route('type_menus.index')->with('status','Type de menu supprimé avec succès');
        }
   }
}
