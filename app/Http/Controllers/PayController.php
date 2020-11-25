<?php

namespace App\Http\Controllers;

use App\Models\Pay;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
class PayController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
  
    public function index()
    {
      
        return view('pages.backoffice.pays.list', [
            'pays'                    =>Pay::all()
        ]);
    }



    public function create()
    {
        
        return view('pages.backoffice.pays.form');
    }
    

    public function store(Request $request)
    {
        $data=request()->validate([
            'nom'=> ['required','string','max:255','min:3'],
            'icone'=> ['image'],
            'codeiso3_pays_origine' => ['required','string','max:255','min:3']


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
          $request->session()->flash('status', 'pays ajoutée avec succès');
          return redirect()->route('pays.index');
    }


}
