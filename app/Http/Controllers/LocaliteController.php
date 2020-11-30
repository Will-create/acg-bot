<?php

namespace App\Http\Controllers;

use App\Models\Localite;
use App\Models\Unite;
use App\Models\Pay;
use App\Models\Restriction;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class LocaliteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
  
    public function index()
    {
        $localites=Localite::orderBy('pays_id','asc')->get();
        return view('pages.backoffice.localites.index',compact('localites'));
    }



    public function create()
    {
        $pays=Pay::orderBy('nom', 'asc')->get();

        return view('pages.backoffice.localites.form',compact('pays'));
    }

   
    public function store(Request $request)
    {
        $data=request()->validate([
            'nom'=> ['required','string','max:255','min:3'],
            'pays_id'=> ['required','integer'],


          ]);


          $localite= new Localite;





          $localite->nom=$data['nom'];

          $localite->pays_id =$data['pays_id'];

          $localite->uuid=Str::uuid();
          $localite->save();
          $request->session()->flash('status', 'localitée ajoutée avec succès');
          return redirect()->route('localites.index');
    }
    

    
    public function show(Localite $localite)
    {
        return view('pages.backoffice.localites.show', compact('localite'));
    }


    public function filter($p)
    {  
        $pay=Pay::where('id',$p )->first();
      
        return view('pages.backoffice.localites.filter', [
            'localites'                    =>Localite::where('pays_id',$pay->id)->get(),
            'pays'                         =>Pay::all(),
            'pay'                          =>$pay
        ]);
    }

  
    public function edit(Localite $localite)
    {
        $pays=Pay::orderBy('nom', 'asc')->get();


        return view('pages.backoffice.localites.edit',compact('localite','pays'));
    }
 
    public function update(Request $request, Localite $localite)
    {

        $data=request()->validate([
            'nom'=> ['required','string','max:255','min:3'],
            'pays_id'=> ['required','integer'],


          ]);
          $localite->nom=$data['nom'];

          $localite->pays_id =$data['pays_id'];

          $localite->uuid=Str::uuid();
          $localite->save();

         $request->session()->flash('status','localité  modifiée avec succès!');
          return redirect()->route('localites.index');
    }


 
    
    public function destroy(Request $request, Localite $localite)
    {


        $restriction = new Restriction;

        $restrictions = $restriction->check($localite->id,[
            ['foreignkey'=>'localite_id','modelname'=>'unite'],            ]);
        
           if ($restrictions){
            
            return redirect()->back()->with('danger',$restrictions['message']);
           }else{
            $localite->delete();
            return redirect()->route('localites.index')->with('status','Localité supprimée avec succès');
           }
       

       
    }

    public function ville_by_country($pay_id) {

        $villes =  Localite::where('pays_id', $pay_id)->get();
         return response()->json($villes);

    }

}
