@extends('layouts.master4')
@section('css')
<link rel="stylesheet" href="/css/servicefoot.css">
<style>
    .scrollss{
        overflow: scroll; 
        width: auto;
        height: 265px;
    }
</style>
@endsection
@section('page-header')
                <!-- PAGE-HEADER -->
                @include('partials._notification')
                    <div class="container">
                        <div class="page-header">
                            <div>
                            <h1 class="page-title text-dark">Details d 'application</h1>
                                <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('accueil')}}">Accueil</a></li>
                                <li class="breadcrumb-item"><a href="{{route('servicefoot.index')}}">ServiceFoot</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><span class="text-dark"></span>COPA</li>
                                </ol>
                            </div>
                        </div>
                    </div>
				<!-- PAGE-HEADER END -->
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                    <div class="scrollss">
                                <div id="output" class="text-dark h-100 w-100 "  >
                                            
                                    </div>
                                    <h6>Vous pouvez modifier le message et envoyer </h6>
                                    <button class="btn button1 " onclick="push()"> Push</button> 
                                </div><hr>
                                <textarea name="modifier" class="form-control mb-1" id="exampleFormControlTextarea1" rows="3" placeholder="Saisissez ou modifiez"></textarea>
                                <button  onclick="envoyer()" type="submit" class="btn button text-center">Valider</button>
                        </div>
                    </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body w-100 h-100">
                        <h4>Mssages envoyés</h4><hr>
                        <div class=" p-2 bg-light "  >
                            <div class="scrollss">
                                <div class="shadow-sm p-1 mb-2 bg-white rounded" id="scrollspyHeading">
                                    <p id="scrollspyHeadin"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>





    <script language="javascript" type="text/javascript">
                    var wsUri = "wss://echo.websocket.org/";
                    var output;
                    var message = {
                            id : 64565,
                            slug : 'telecel-faso-servicefoot',
                            conte<div class="scrollss">
                                    <div id="output" class="text-dark h-100 w-100 "  >
                                            
                                    </div>
                                    <h6>Vous pouvez modifier le message et envoyer </h6>
                                    <button class="btn button1 " onclick="push()"> Push</button> 
                                </div><hr>
                    function initElement()
                    {
                        var message = document.getElementById("message");
                        var p = document.getElementById("message");
                        p.onclick = showAlert;
                    };

                    function showAlert()
                    {
                        alert("message envoyé");
                    }

                    function init()
                    {
                        output = document.getElementById("output");
                        smsWebSocket();
                    }

                    function smsWebSocket()
                    {
                        websocket = new WebSocket(wsUri);
                        websocket.onopen = function(evt) { onOpen(evt) };
                        websocket.onclose = function(evt) { onClose(evt) };
                        websocket.onmessage = function(evt) { onMessage(evt) };
                        websocket.onerror = function(evt) { onError(evt) };
                    }

                    function onOpen(evt)
                    {
                        // writeToScreen("CONNECTED");
                        doSend("WebSocket rocks");
                    }

                    function onClose(evt)
                    {
                        // writeToScreen("DISCONNECTED");
                    }

                    function onMessage(evt)
                    {
                        writeToScreen('<span style="color: black;">RESPONSE: ' + evt.data+'</span>');
                        websocket.close();
                    }

                    function onError(evt)
                    {
                        writeToScreen('<span style="color: red;">ERROR:</span> ' + evt.data);
                    }

                    function doSend(message)
                    {
                        writeToScreen("SENT: " + message);
                        websocket.send(message);
                    }

                    function whiteToScreen (message){
                        var screen = document.getElementById('output');
                                var template = `
                                <div class="">
                                        <div id="message${message.id}" class="p-2 bg-light">
                                            <div >
                                                <div   >
                                                    <small class="p-2 mb-2 bg-white w-75 chat">${message.content} id${message.id}</small>
                                                </div> 
                                                <a href="javascript:send('${message.content}')"  class="btn button1 ">Envoyer</a>
                                                <a href="javascript:edit('${message.content}')"  class="btn button1">Edit</a>
                                            </div>
                                        </div>
                                    </div>
                                `
                                screen.innerHTML += template;
                    }
                    var i = 0;
                    function push(){
                        i++;
                        message.id = i;
                        whiteToScreen(message);
                    }
                    function send(content){
                        console.log(content);
                    } 
                    function edit(contenu){
                        var textarea = document.getElementById('exampleFormControlTextarea1');
                        textarea.value = contenu;
                    };
                    function envoyer(contenu){
                        var textarea = document.getElementById('exampleFormControlTextarea1');
                        send(textarea.value);
                    };
                    function afficher(messages){
                        document.getElementById('scrollspyHeadin').innerHTML="Message: " + message.content;
                    }
                    window.addEventListener("load", init, false);
                </script>
@endsection