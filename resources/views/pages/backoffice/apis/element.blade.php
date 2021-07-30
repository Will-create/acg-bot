@section('css')
<link rel="stylesheet" href="/css/servicefoot.css">
<style>
    .scrollss{
        overflow: scroll; 
        width: auto;
        height: 465px;
    }
    .chats{
        width: 80%;
        height: auto;
    }
    .bor{
        border-radius: 10%;
    }
</style>
@endsection
		   <div class="shadow-lg p-3 mb-5 bg-white rounded">
            <div class="m-3  bor rounded">
                <div class="row">
                    <div class="d-flex">
                        <div class="col-4">
                            <div class="mb-2">
                                <small class="text-bold">Le nombre est : {{strlen($sms->contenu_entree)}} caractères</small>
                            </div>
                        </div>
                        <div class="col-4"></div>
                        <div class="col-4">
                            <div class="text-right mb-2">
                                <small >Reçu:{{$sms->created_at->format('m-d-Y à H:i:s')}}</small>
                            </div>
                        </div>
                    </div>
                </div>
                    <small class="text-dark chats" >{{$sms->contenu_entree}} </small>
                    <div class="row mt-2">
                        <div class="d-flex">
                            <div class="col-4"></div>
                            <div class="col-2">
                                <a href="javascript:send('{{$sms->contenu_entree}}')"  class="btn button1 ">Envoyer</a>
                            </div>
                            <div class="col-2"></div>
                            <div class="col-2">
                                <a href="javascript:edit('{{$sms->contenu_entree}}')" value="<?php echo $sms->contenu_entree; ?>"  class="btn button1">Edit</a>
                            </div>
                            <div class="col-2"></div>
                        </div>
                    </div>
                </div>
           </div>
           

           <script language="javascript" type="text/javascript">
            var wsUri = "wss://echo.websocket.org/";
            var output;
            var message = {
                    id : 'id',
                    slug : 'slug',
                    content : <?php echo json_encode($sms->contenu_entree); ?>,
                    dtcreated : 'dtcreated'
                };

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
            //window.addEventListener("load", init, false);
        </script>  
