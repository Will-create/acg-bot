@extends('layouts.master4')

@section('page-header')
                <!-- PAGE-HEADER -->
                @include('partials._notification')
                    <div class="container">
                        <div class="page-header">
                            <div>
                            <h1 class="page-title text-dark">Detail des matchs du service foot</h1>
                                <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('accueil')}}">Accueil</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><span class="text-dark"></span>Tous les atchs</li>
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
                            <h2> Les messages entrants</h2> <hr>
                            <div id="output" class="text-dark h-100 w-100"  >
                                    <div class="" id="message">
                                        <small>ceci est un message de telecel le match Burkuna Faso vs Mali debut dans 5 minutes</small>
                                    </div> 
                                    <a href="#" onload="initElement();" class="btn btn-primary">Envoyer</a><hr>

                                    <h6>Vous pouvez modifier le message et envoyer </h6>
                                    <form action="{{route('servicefoot.store')}}" method="post">
                                        @csrf
                                        <textarea name="modifier" class="form-control mb-1" id="exampleFormControlTextarea1" rows="3"></textarea>
                                        <button type="submit" class="btn btn-primary text-center">Valider</button>
                                    </form>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h4>Les messages envoyés</h4><hr>
                        <div class="shadow-lg p-3 mb-1 bg-white rounded">
                            <p class="text-dark">message envoyés avec succès</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>





    <script language="javascript" type="text/javascript">
                    var wsUri = "wss://echo.websocket.org/";
                    var output;

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
                        // writeToScreen('<span style="color: black;">RESPONSE: ' + evt.data+'</span>');
                        websocket.close();
                    }

                    function onError(evt)
                    {
                        writeToScreen('<span style="color: red;">ERROR:</span> ' + evt.data);
                    }

                    function doSend(message)
                    {
                        // writeToScreen("SENT: " + message);
                        websocket.send(message);
                    }

                    function writeToScreen(message)
                    {
                        var pre = document.createElement("p");
                        pre.style.wordWrap = "break-word";
                        pre.innerHTML = message;
                        output.appendChild(pre);
                    }

                    window.addEventListener("load", init, false);

                </script>
@endsection