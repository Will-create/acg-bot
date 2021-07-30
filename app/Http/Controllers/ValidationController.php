<?php

namespace App\Http\Controllers;

use App\Models\Validation;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\SoftDeletes;

class ValidationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $validations = Validation::all();
        $utilisateurs  = User::latest()->get();
        return view('pages.backoffice.administrateur.utilisateurs.validation', compact('validations', 'utilisateurs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data =   $request->validate([
            'message_arriver'     => ['nullable', 'text'],
            'message_modifier'    => ['nullable', 'text', ],
            'uuid'                => ['nullable', 'string'],
            'par'                 => ['nullable', 'integer'],
            'user_id'             => ['nullable', 'integer'],
            'opearteur_id'        => ['nullable', 'integer'],
            'type_menu_id'        => ['nullable', 'integer'],
        ]);

        $validation =  new Validation();
        $validation -> message_arriver = $request ['message_arriver'];
        $validation -> message_modifier = $request ['message_modifier'];
        $validation -> uuid=Str::uuid();
        $validation -> par = $request ['par'];
        $validation -> user_id = $request ['user_id'];
        $validation -> opearteur_id = $request ['opearteur_id'];
        $validation -> type_menu_id = $request ['type_menu_id'];

        try {
            $validation-> save();
        return response()->json(['success' => true]);

        } catch (\Throwable $th) {
            return response()->json(['success' => false]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Validation  $validation
     * @return \Illuminate\Http\Response
     */
    public function show(Validation $validation)
    {
        $titrePage = "Le message est prêt à etre envoyer veillez valider";

        $validations = Validation::where('uuid', $uuid)->first();
        return view('pages.backoffice.administrateur.utilisateurs.validation', compact('validations', 'titrePage'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Validation  $validation
     * @return \Illuminate\Http\Response
     */
    public function edit(Validation $validation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Validation  $validation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Validation $validation)
    {
        $data =   $request->validate([
            'message_arriver'     => ['nullable', 'text'],
            'message_modifier'    => ['nullable', 'text', ],
            'uuid'                => ['nullable', 'string'],
            'par'                 => ['nullable', 'integer'],
            'user_id'             => ['nullable', 'integer'],
            'opearteur_id'        => ['nullable', 'integer'],
            'type_menu_id'        => ['nullable', 'integer'],
        ]);

        $validation =  new Validation();
        $validation -> message_arriver = $request ['message_arriver'];
        $validation -> message_modifier = $request ['message_modifier'];
        $validation -> uuid=Str::uuid();
        $validation -> par = $request ['par'];
        $validation -> user_id = $request ['user_id'];
        $validation -> opearteur_id = $request ['opearteur_id'];
        $validation -> type_menu_id = $request ['type_menu_id'];

        if ('message_arriver' === 'message_arriver') {
            $validation->save()->message_arriver = $request ['message_arriver'];
        }
        else{
            $validation->save()->message_modifier = $request ['message_modifier'];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Validation  $validation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Validation $validation)
    {
        //
    }
    // public function softdelete(\App\Models\Validation $validations, Request $request) {

    //     $validations->delete();
    //     return redirect('/validation/');
   
    // }
}
