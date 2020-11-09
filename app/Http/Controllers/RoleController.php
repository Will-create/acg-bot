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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles=Role::all();
        return view('pages.backOffice.administrateur.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.backOffice.administrateur.roles.form');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show($uuid)
    {
        $role=Role::where('uuid',$uuid)->first();
        return view('pages.backOffice.administrateur.roles.edit',compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit($uuid)
    {   $role=Role::where('uuid',$uuid)->first();
        return view('pages.backOffice.administrateur.roles.edit',compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        //
    }
}
