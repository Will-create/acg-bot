<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Support\Str;
use Redirect;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages= Message::where('content')->with('auteur','content')->orderBy('id','desc')->get();
        $titrePage = "Liste de tous les messages";
   
        return view('pages.backoffice.messages.index', compact('messages', 'titrePage'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.backoffice.administrateur.utilisateurs.validation');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

        $request->validate([
            'content' => 'nullable',
            'modifier' => 'nullable',
            'user_id' => 'nullable',
        ]);

        // $message =  new Message();
        // $message -> content = $request ['content'];
        // $message -> slug = $request ['slug'];
        // $message -> user_id = $request ['user_id'];
 
        $insert = [
            'content' => $request->content,
            'modifier' => $request->content,
            'slug' => str::slug('je teste'),
            'user_id' => $request->user_id,
        ];
        try {
            
        return response()->json(['success' => true, 'value'=>Message::insertGetId($insert)]);

        } catch (\Throwable $th) {
            return response()->json(['success' => $th]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        return view('pages.backoffice.messages.show',[
            'message'   => $message,
            'autres'   =>Message::where('sms_id',$message->users->id)->get(),
            'titrePage' => "Détails d'un message"
        ]);



        // $titrePage = "Le message est prêt à etre envoyer veillez valider";
        // $messages = Message::where('content')->first();
        // return view('pages.backoffice.administrateur.utilisateurs.message', compact('messages', 'titrePage'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Message $message)
    {
        $commentaire->delete();
        return redirect()->route('messages.index')->with('status','message supprimé avec succès');
        
    }
}
