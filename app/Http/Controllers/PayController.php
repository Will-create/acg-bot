<?php

namespace App\Http\Controllers;

use App\Models\Pay;
use App\Models\Unite;
use App\Models\Localite;
use App\Models\Restriction;
use Illuminate\Support\Str;
use App\Models\AireProtegee;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class PayController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    { 
        $titrePage = "Liste de toutes les pays ";
        return view('pages.backoffice.pays.index', [
            'pays'                    =>Pay::all(),
            'titrePage' => $titrePage
        ]);
    }
    public function create()
    {

        return view('pages.backoffice.pays.createdit', [
            'pays' => new Pay(),
            'titrePage' => "Ajout d'un nouveau pays",
            'btnAction' => "Ajouter"
        ]);
    }
    public function show($uuid)
    {
        $titrePage = "Détails d'un  pays : ";

        return view('pages.backoffice.pays.show',[
            'pays'        => $pay = Pay::where('uuid',$uuid)->with('localites')->first(),
            'unites'      => Unite::where('pays_id',$pay->id)->get(),
            'aires'       => AireProtegee::where('pays_id',$pay->id)->get(),
            'localites'   => Localite::where('pays_id',$pay->id)->get(),
            'titrePage'   => $titrePage.$pay->nom
        ]);
    }
    public function store(Request $request)
    {
        $data=request()->validate([
            'nom'=> ['required','string','max:255','min:3','unique:pays'],
            'icone'=> ['required'],
            'codeiso3_pays_origine' => ['required','string','max:2','min:1','unique:pays']
          ]);
          $pays = new Pay;
          if($request->hasFile('icone')){
            $file = $request->file('icone');
            $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
            $name = $timestamp. '-' .$file->getClientOriginalName();
            $iconePath=request('icone')->storeAs('/storage/images/flags',$name,'public');
            $pays->icone = $iconePath;
         }
          $pays->nom=$data['nom'];
          $pays->codeiso3_pays_origine =$data['codeiso3_pays_origine'];
          $pays->uuid=Str::uuid();
          $pays->save();
          $request->session()->flash('status', 'pays ajouté avec succès');
          return redirect()->route('pays.show', $pays->uuid);
    }
    public function edit($uuid)
    {
        return view('pages.backoffice.pays.createdit', [
            'pays'      =>Pay::where('uuid', $uuid)->first(),
            'titrePage' => "Mise à jour ".Pay::where('uuid', $uuid)->first()->nom,
            'btnAction' => "Mettre à jour"
        ]);
    }
    public function update(Request $request, $uuid)
    {
        $pays = Pay::where('uuid', $uuid)->first();
        $data=request()->validate([
        'nom'=> ['required','string','max:255','min:3'],
        'icone'=> ['image','nullable'],
        'codeiso3_pays_origine' => ['string','max:2','min:1']
         ]);
      if($request->hasFile('icone')){
        $file = $request->file('icone');
        $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
        $name = $timestamp. '-' .$file->getClientOriginalName();
        $iconePath=request('icone')->storeAs('/storage/images/flags',$name,'public');
        $pays->icone = $iconePath;
     }
      $pays->nom=$data['nom'];
      $pays->codeiso3_pays_origine =$data['codeiso3_pays_origine'];
      $pays->save();
      $request->session()->flash('status', 'Pays mis a jours avec succès');
      return redirect()->route('pays.show', $pays->uuid);
    }
    public function destroy(Request $request, $uuid)
    {
        $pays = Pay::where('uuid', $uuid)->first();
        $restriction = new Restriction();
        $restrictions = $restriction->check($pays->id,[
            ['foreignkey'=>'pays_id','modelname'=>'Unite'],
            ['foreignkey'=>'pays_id','modelname'=>'Localite'],
            ['foreignkey'=>'pays_id','modelname'=>'AireProtegee'],
            ['foreignkey'=>'pays_apprehension','modelname'=>'Crime'],

            ]);
           if ($restrictions){
            return redirect()->back()->with('danger',$restrictions['message']);
           }else{
            $pays->delete();
            return redirect()->route('pays.index')->with('status','Pays supprimée avec succès');
           }
    }
}
