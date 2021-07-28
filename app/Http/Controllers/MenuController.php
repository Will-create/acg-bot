<?php
namespace App\Http\Controllers;

use App\Models\Api;
use App\Models\Sms;
use App\Models\Menu;
use App\Models\TypeMenu;
use App\Models\Restriction;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class MenuController extends Controller
{
    public function index() 
    {
        $menus=Menu::where('type_menu_id',1)->orderBy('type_menu_id','desc')->get();
        $titrePage = "Liste de toutes les rubriques";
        foreach($menus as $menu){
            if($menu->type_menu_id==2){
                $menu->parent= Menu::parent($menu->uuid);
            }
        }
        return view('pages.backoffice.menus.index',compact('menus','titrePage'));
    }
    public function api($parent)
    {
        $sousmenu = [];
        $apis = Api::all();
        
        $menus=Menu::where('type_menu_id',2)->orderBy('type_menu_id','asc')->get();
        foreach($menus as $menu){

            if($menu->type_menu_id==2){
                if($menu->pseudo==$parent){
                    
                    $sousmenu[]=$menu; 
                }
                foreach($apis as $api){
                    $nom = Str::slug($api->menu->nom);
                    if($nom === $parent){
                        $menu['api']=$api;
                    }
                }
                
            }
        }
        return response()->json($sousmenu);
    }
    public function list_by_automate_id($automateId)
    {
       
       
        $menus=Menu::where('automate_id',$automateId)->get();
        
        return response()->json($menus);
    }
    public function create()
    {
        return view('pages.backoffice.menus.createdit', [
            'menu' => new Menu(),
            'types' =>TypeMenu::orderBy('nom','asc')->get(),
            'parents' =>Menu::where('parent_id',null)->orderBy('nom','asc')->get(),
            'automates' => automates(),
            'titrePage' => "Ajout d'une rubrique ou d'une application ",
            'btnAction' => "Ajouter"
        ]);
    }

    public function store(Request $request)
    {
        $data=request()->validate([
            'nom'                               => ['required','string','max:255','min:3','unique:menus'],
            'type_menu_id'                      => ['required','integer'],
            'parent_id'                         => ['nullable','integer'],
            'description'                       => ['nullable','string','min:3'],
          ]);
          $menu= new Menu();
          if(isset($request->parent_id)){
              $menu->parent_id = $data['parent_id'];
              $menu->parent_uuid = Menu::where('id',$request->parent_id)->first()->uuid;
              $menu->pseudo=Str::slug(Menu::where('id',$data['parent_id'])->first()->nom);
          }else{
            $menu->parent_id = null;
            $menu->parent_uuid = null;
          }
          $menu->nom=$data['nom'];
          $menu->type_menu_id=$data['type_menu_id'];
          $menu->description=$data['description'];
          $menu->uuid=Str::uuid();
          $menu->pseudo=Str::slug($data['nom']);
          $menu->save();
          $request->session()->flash('status','Menu créé avec succès!!!');
          return redirect()->route('menus.show',$menu->uuid);
    }
    public function show(Request $req,$uuid)
    {
        $menu = Menu::where('uuid',$uuid)->with('type')->first();
        $titrePage = "Détails d'un menu";
        $sousmenus = []; 
        $parent = []; 
        $apis = [];
        if($menu->type_menu_id == 1){
            $sousmenus = Menu::where('parent_uuid',$menu->uuid)->orderBy('nom','desc')->get();
        }else{
            $apis =Api::where('menu_id',$menu->id)->get(); 
            $todays = Sms::where('operateur',$menu->operateur)->whereDate('created_at', Carbon::today()->toDateString())->get();
            $textos = Sms::where('envoye',true)->get();
            $parent = Menu::parent($menu->uuid);
        }
        $todays = Sms::whereDate('created_at', Carbon::today()->toDateString())->get();
        $textos = Sms::where('envoye',true)->get();
        $automate = automate($menu->automate_id);
        return view('pages.backoffice.menus.show', compact('menu','sousmenus','automate','textos','todays','apis','parent','titrePage'));
    }
    public function edit(Menu $menu)
    {
        return view('pages.backoffice.menus.createdit', [
            'menu' => $menu,
            'types' =>TypeMenu::orderBy('nom','asc')->get(),
            'parents' =>Menu::where('parent_id',null)->orderBy('nom','asc')->get(),
            'automates' => automates(),
            'titrePage' => "Mise à jour de rubrique/application ". $menu->nom,
            'btnAction' => "Mettre à jour"
        ]);
    }


    public function update(Request $request, Menu $menu)
    {
        $data=request()->validate([
            'nom'                   => ['required','string','max:255','min:3'],
            'type_menu_id'                 => ['required','integer'],
            'parent_id'                       => ['nullable','integer'],
            'automate_id'                       => ['nullable','integer'],
            'description'                   => ['nullable','string','min:3'],
          ]);
          $menu->nom=$data['nom'];
          $menu->type_menu_id=$data['type_menu_id'];
          if($request->parent_id){
            $menu->parent_id = $data['parent_id'];
            $menu->parent_uuid =Menu::where('id',$data['parent_id'])->first()->uuid;
            $menu->pseudo=Str::slug(Menu::where('id',$data['parent_id'])->first()->nom);
            }
            if($request->automate_id){
                $menu->automate_id = $data['automate_id'];
                }
          $menu->description=$data['description'];
          $menu->save();
          $request->session()->flash('status','Informations de menu mises à jours avec succès!!!');
          return redirect()->route('menus.show', $menu->uuid);
    }
    public function destroy(Request $request, Menu $menu)
    {
        // $restriction = new Restriction;
        // $restrictions = $restriction->check($menu->id,[
        //     ['foreignkey'=>'type_crime_id','modelname'=>'crime'],            ]);
        //    if ($restrictions){
        //     return redirect()->back()->with('danger',$restrictions['message']);
        //    }else{
        //     //supprimer maintenant
        // }
        $menu->delete();
        return redirect()->route('menus.index')->with('status','Menu supprimé avec succès');
    }

    public function listeMenu(){
        $operateurs = operateurs();
        $liste = [];
        foreach($operateurs as $operateur){
            
            $operateur['rubriques'] = fonctions($operateur['nom']);
            $liste[] = $operateur;
        }
        return response()->json($liste);
    }
}
