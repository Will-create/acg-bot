<?php
namespace App\Http\Controllers;
use App\Models\Unite;
use App\Models\Restriction;
use App\Models\Pay;
use App\Models\User as U;
use App\Models\Localite;
use App\Models\TypeUnite;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UniteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        switch (Auth::user()->role->designation) {
            case 'Administrateur Général':
        $unites=Unite::orderBy('designation','asc')->get();

                 break;
            case 'Coordonnateur Régional':
        $unites=Unite::orderBy('designation','asc')->get();

                 break;
            case 'Coordonnateur National':
        $unites=Unite::where('pays_id', Auth::user()->pay->id)->orderBy('designation','asc')->get();

                 break;
            case 'Chef d’Unité':
                 // $unites = Unite::wh ere('pays_id', $pays->id)->get();
                break;

            default:
                abort(404);
                break;
        }
        $titrePage = "Liste de toutes les unités de lois";

        return view('pages.backoffice.unites.index',compact('unites','titrePage'));
    }
    public function filter()
    {
        $titrePage = "Liste de toutes les unités de par pays";
        $p = 1;
        $pay=Pay::where('id',$p )->first();
        return view('pages.backoffice.unites.filter', [
            'unites'                       =>Unite::where('pays_id',$pay->id)->with(['pays','type'])->get(),
            'pays'                         =>Pay::orderBy('nom','asc')->get(),
            'pay'                          =>$pay,
            'titrePage' => $titrePage

        ]);
    }

    public function filtreur($p)
    {
        $titrePage = "Liste de toutes les unités par pays";

        $pay=Pay::where('id',$p )->first();

        return response()->json([
            'unites'                    =>Unite::where('pays_id',$pay->id)->with('pays','type','localite')->get(),
            'pays'                         =>Pay::orderBy('nom','asc')->get(),
            'pay'                          =>$pay,
            'titrePage' => $titrePage
        ]);
    }
    public function create()
    {
        return view('pages.backoffice.unites.createdit', [
            'unite' => new Unite(),
            'localites' => Localite::with('pay')->orderBy('pays_id', 'asc')->get(),
            'responsables' => U::with('role','pays')->get(),
            'types' =>TypeUnite::orderBy('nom','asc')->get(),
            'pays' =>Pay::orderBy('nom','asc')->get(),
            'titrePage' => "Ajout d'une nouvelle unité de lois",
            'btnAction' => "Ajouter"
        ]);
    }

    public function store(Request $request)
    {
        $data=request()->validate([
            'designation'                   => ['required','string','max:255','min:3','unique:unites'],
            'type_unite_id'                 => ['required','integer'],
            'tel'                           => ['required','string','max:255','min:3'],
            'tel2'                          => ['nullable','string','max:255','min:3'],
            'administration_tutelle'        => ['nullable','string','max:255','min:3'],
            'adresse'                       => ['required','string','max:255','min:3'],
            'responsable_id'                =>['required','integer'],
            'lat'                           => ['nullable','string','max:255','min:8'],
            'long'                          => ['nullable','string','max:255','min:8'],
            'logo'                          => ['required'],
            'photo_couverture'              => ['nullable'],
            'pays_id'                       => ['required','integer'],
            'localite_id'                   => ['required','integer'],
          ]);
          $unite= new Unite;
          if($request->hasFile('logo')){
            $file = $request->file('logo');
            $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
            $name = $timestamp. '-' .$file->getClientOriginalName();
            $logoPath=request('logo')->storeAs('logo_uploads',$name,'public');
            $unite->logo = $logoPath;
         }
         if($request->hasFile('photo_couverture')){
            $file = $request->file('photo_couverture');
            $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
            $name = $timestamp. '-' .$file->getClientOriginalName();
            $photoPath=request('photo_couverture')->storeAs('photo_uploads',$name,'public');
            $unite->photo_couverture = $photoPath;
             }
          $unite->designation=$data['designation'];
          $unite->type_unite_id=$data['type_unite_id'];
          $unite->tel=$data['tel'];
          $unite->tel2=$data['tel2'];
          $unite->administration_tutelle=$data['administration_tutelle'];
          $unite->adresse=$data['adresse'];
          $unite->responsable_id=$data['responsable_id'];
          $unite->lat=$data['lat'];
          $unite->long=$data['long'];
          $unite->pays_id =$data['pays_id'];
          $unite->localite_id=$data['localite_id'];
          $unite->uuid=Str::uuid();
          $unite->save();
          $request->session()->flash('status','Unité créée avec succès!!!');
          return redirect()->route('unites.show',$unite->uuid);
    }
    public function show(Unite $unite)
    {
        function openstreetmap_url($lon, $lat, $zoom=13) {
            $url = 'https:⁄⁄www.openstreetmap.org/?mlat='.$lat.'&amp;mlon='.$lon.'#map='.$zoom.'/'.$lat.'/'.$lon;
            return $url;
        }
        $titrePage = "Liste de toutes les unités de lois";
        $agents= U::where('unite_id',$unite->id)->get();
        $carte=openstreetmap_url($unite->long,$unite->lat);
        return view('pages.backoffice.unites.show', compact('unite','carte','agents','titrePage'));
    }
    public function edit(Unite $unite)
    {
        return view('pages.backoffice.unites.createdit', [
            'unite' => $unite,
            'localites' => Localite::with('pay')->orderBy('pays_id', 'asc')->get(),
            'responsables' => U::with('role','pays')->get(),
            'types' =>TypeUnite::orderBy('nom','asc')->get(),
            'pays' =>Pay::orderBy('nom','asc')->get(),
            'titrePage' => "Mise à jour ". $unite->designation,
            'btnAction' => "Mettre à jour"
        ]);
    }


    public function update(Request $request, Unite $unite)
    {
        $data=request()->validate([
            'designation'=> ['required','string','max:255','min:3'],
            'type_unite_id'=> ['required','integer'],
            'tel'=> ['required','string','max:255','min:3'],
            'tel2'=> ['nullable', 'string','max:255','min:3'],
            'administration_tutelle'=> ['nullable','string','max:255','min:3'],
            'adresse'=> ['required','string','max:255','min:3'],
            'responsable_id'=>['required','integer'],
            'lat'=> ['string','max:255','min:8'],
            'long'=> ['nullable', 'string','max:255','min:8'],
            'logo'=> ['nullable', 'image'],
            'photo_couverture'=> ['nullable'],
            'pays_id'=> ['required','integer'],
            'localite_id'=> ['required','integer'],
          ]);
         if($request->hasFile('logo')){
            $file = $request->file('logo');
            $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
            $name = $timestamp. '-' .$file->getClientOriginalName();
            $logoPath=request('logo')->storeAs('logo_uploads',$name,'public');
            $unite->logo = $logoPath;
         }
         if($request->hasFile('photo_couverture')){
            $file = $request->file('photo_couverture');
            $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
            $name = $timestamp. '-' .$file->getClientOriginalName();
            $photoPath=request('photo_couverture')->storeAs('photo_uploads',$name,'public');
            $unite->photo_couverture = $photoPath;
             }
          $unite->designation=$data['designation'];
          $unite->type_unite_id=$data['type_unite_id'];
          $unite->tel=$data['tel'];
          $unite->tel2=$data['tel2'];
          $unite->administration_tutelle=$data['administration_tutelle'];
          $unite->adresse=$data['adresse'];
          $unite->responsable_id=$data['responsable_id'];
          $unite->lat=$data['lat'];
          $unite->long=$data['long'];
          $unite->pays_id =$data['pays_id'];
          $unite->localite_id=$data['localite_id'];
          $unite->uuid=Str::uuid();
             $unite->save();
          $request->session()->flash('status','Unité mise à jours avec succès!!!');
          return redirect()->route('unites.show', $unite->uuid);
    }
    public function destroy(Request $request, Unite $unite)
    {
        $restriction = new Restriction;
        $restrictions = $restriction->check($unite->id,[
            ['foreignkey'=>'type_crime_id','modelname'=>'crime'],            ]);
           if ($restrictions){
            return redirect()->back()->with('danger',$restrictions['message']);
           }else{
            $unite->delete();
            return redirect()->route('unites.index')->with('status','Unité supprimée avec succès');
           }
    }
}
