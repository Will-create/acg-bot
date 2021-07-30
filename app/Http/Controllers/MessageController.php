<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Support\Str;
use Redirect;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class MessageController extends Controller
{
   
    public function index()
    {
        $messages= Message::where('content', '')->with('auteur','content')->orderBy('id','desc')->get();
        $titrePage = "Liste de tous les messages";
        return view('pages.backoffice.messages.index', compact('messages', 'titrePage'));
    }

    public function can(){
        return view('/servicefoots.can.index');
    }
    public function copa(){
        return view('/servicefoots.copa.index');
    }
    public function coupeDuMonde(){
        return view('/servicefoots.coupemonde.index');
    }
    public function euro(){
        return view('/servicefoots.euro.index');
    }
    public function europaLigue(){
        return view('/servicefoots.europaligue.index');
    }
    public function ligueDesChampion(){
        return view('/servicefoots.liguechampion.index');
    }
    public function serviceFoot(){
        return view('/servicefoots.index');
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

   

}
