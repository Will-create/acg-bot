<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $roles=Role::all();
        return view('pages.backoffice.administrateur.roles.index', compact('roles'));
    }
    public function create()
    {
        return view('pages.backoffice.administrateur.roles.form');
        
    }

    public function store(Request $request)
    {
         
        $data=request()->validate([
            'designation'=> ['required','string','max:255','min:3'],
            'description'=> ['string','max:255','min:4'],
          ]);
         
          $roles= new Role();
          $roles->designation=$data['designation'];
          $roles->description =$data['description'];
          $roles->uuid=Str::uuid();
          $roles->save();
         $request->session()->flash('status','Rôle  engistré avec succès!');
          return redirect()->route('roles.index');
    }

    public function show($uuid)
    {
        $role=Role::where('uuid',$uuid)->first();
        return view('pages.backoffice.administrateur.roles.edit',compact('role'));
    }
    public function edit($uuid)
    {   $role=Role::where('uuid',$uuid)->first();
        return view('pages.backoffice.administrateur.roles.edit',compact('role'));
    }
    public function update(Request $request, $uuid)
    {
        $data=request()->validate([
            'designation'=> ['required','string','max:255','min:3'],
            'description'=> ['string','max:255','min:4'],
          ]);
          $role=Role::where('uuid',$uuid)->first();
          $role->designation=$data['designation'];
          $role->description =$data['description'];
          $role->uuid=Str::uuid();
          $role->save();
         $request->session()->flash('status','Rôle  modifié avec succès!');
          return redirect()->route('roles.index');
    }
    public function destroy(Role $role)
    {
        //
    }
}
