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
                            <h1 class="page-title text-dark">Liste des liaisons</h1>
                                <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('accueil')}}">Accueil</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><span class="text-dark"></span>Servicefoot</li>
                                    <li class="breadcrumb-item active" aria-current="page"><span class="text-dark"></span>Paramètre</li>
                                    <li class="breadcrumb-item active" aria-current="page"><span class="text-dark"></span>Liaisons</li>
                                </ol>
                            </div>
                            <div class="ml-auto pageheader-btn">
                                @if (Auth::user()->role->id == 1 )
                                {{-- <a class="btn btn-primary" href="{{route('liaisons.create')}}"  >  <span>
                                    <i class="fe fe-plus"></i>
                                </span>
                                Ajouter une compétition</a> --}}
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap"> <i class="fe fe-plus"></i> Ajouter une Liaison</button>
                                    @else
                                    @error('onglet')
                                               @php
                                                   $modal = "false"
                                               @endphp
                                    @enderror
                                    <a href="{{ route('menus.index') }}" class="btn btn-primary"> <span>
                                        <i class="fe fe-close"></i>
                                    </span><i class="fa fa-times"></i> Retour</a>
            
                                @endif
                            </div>
                        </div>
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="{{$modal}}">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Ajouter une liaison</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <form action="{{ route('liaisons.store') }}" method="post" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            @csrf
                                            <div class="form-group">
                                                <select name="onglet" id="" class="form-control custom-select select2">
                                                    <option disabled  selected >Choisir une source</option>
                                                    @foreach ($sources as $source)
                                                    
                                                        <option value="{{$source['onglet']}}">{{$source['onglet']}}</option>
                                                    @endforeach
                                                    
                                                </select>
                                                @error('onglet')
                                                <span class="helper-text red-text">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <select name="edition_id" id="" class="form-control custom-select select2">
                                                    <option disabled  selected >Choisir une Edition</option>
                                                    @foreach ($editions as $edition)
                                                    
                                                        <option value="{{$edition->competition_id}}">{{$edition->designation}}</option>
                                                    @endforeach
                                                    
                                                </select>
                                                @error('edition_id')
                                                <span class="helper-text red-text">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                           
                                            <div class="form-group">
                                                <input type="text" name="heure_envoie" placeholder="Heure de declenchement quotidien" class="form-control" id="recipient-name">
                                            </div>
                                           
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-dark" data-dismiss="modal">Retour</button>
                                        <button type="submit" class="btn btn-primary">Envoyer</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
				<!-- PAGE-HEADER END -->
@endsection

@section('content')
@include('partials._notification')
				<!-- ROW-1 OPEN -->
				<div class="row">
					<div class="col-md-12 col-lg-12">
						<div class="card">
							<div class="card-header">
								<h3 class="card-title">Listes des liaisons API</h3>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table id="data-table1" class="table table-striped table-bordered text-nowrap w-100 table-sm">
										<thead>
											<tr>
												{{-- <th class="wd-15p">Photo</th> --}}
												{{--  <th class="wd-15p">Par</th>  --}}
												<th class="wd-15p">ID Source</th>
												<th class="wd-15p">ID Edition</th>
                                                <th class="wd-15p" >Mode</th>
												<th class="wd-30p" >Heure de déclenchement</th>
											</tr>
										</thead>
										<tbody>
                                            @foreach ($configs as $config)
											<tr>
                                                    {{-- <td> <a class="text-dark" href="" data-toggle="tooltip" data-placement="top" title="Cliquer pour afficher les détails" > <div class="col-auto"><span class="avatar brround avatar-md d-block cover-image" data-image-src="{{asset('storage').'/'.$commentaire->photo}}"></span></div> </a></td> --}}
												{{--  <td> <a class="text-dark" href="" data-toggle="tooltip" data-placement="top" title="Cliquer pour afficher les détails" > Alain</a></td>  --}}
												 <td> <a class="text-dark" href="{{route('liaisons.show',$config->uuid)}}" data-toggle="tooltip" data-placement="top" title="Cliquer pour afficher les détails" >{{$config -> onglet}}</a></td>
												 <td> <a class="text-dark" href="{{route('liaisons.show',$config->uuid)}}" data-toggle="tooltip" data-placement="top" title="Cliquer pour afficher les détails" >{{$config -> edition_id}}</a></td>
                                                 <td> <a class="text-dark" href="{{route('liaisons.show',$config->uuid)}}" data-toggle="tooltip" data-placement="top" title="Cliquer pour afficher les détails" >{{$config -> automatique ? "Automatique" : "Validation"}}</a></td>
                                                 <td> <a class="text-dark" href="{{route('liaisons.show',$config->uuid)}}" data-toggle="tooltip" data-placement="top" title="Cliquer pour afficher les détails" >{{$config -> heure_envoi}}</a></td>
                                            </tr>
                                            @endforeach
										</tbody>
									</table>
								</div>
							</div>
							<!-- TABLE WRAPPER -->
						</div>
						<!-- SECTION WRAPPER -->
					</div>
				</div>
			 {{-- @include('pages.backOffice.administrateur.utilisateurs._modelCreationUtilisateur') --}}
@endsection
@section('js')
     <!-- INTERNAL  DATA TABLE JS-->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
    <script src="{{URL::asset('assets/plugins/fileuploads/js/fileupload.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/fileuploads/js/file-upload.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/jquery.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/datatable.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/dataTables.responsive.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/fileexport/dataTables.buttons.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/fileexport/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/fileexport/jszip.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/fileexport/pdfmake.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/fileexport/vfs_fonts.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/fileexport/buttons.html5.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/fileexport/buttons.print.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/fileexport/buttons.colVis.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/clipboard/clipboard.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/clipboard/clipboard.js')}}"></script>
    <!-- INTERNALPRISM JS -->
    <script src="{{URL::asset('assets/plugins/prism/prism.js')}}"></script>
        <!-- INTERNAL TELEPHONE JS -->
    <script src="{{URL::asset('assets/plugins/telephoneinput/telephoneinput.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/telephoneinput/inttelephoneinput.js')}}"></script>
    <script type="text/javascript">
    var modal = document.getElementById('largeModalAddUser');
        @if (count($errors) > 0)
            $('#largeModalAddUser').modal('show');
            modal.classList.add("show");
        @endif
        </script>
    <!-- <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                            <h2> Les messages entrants</h2> <hr>
                            <div id="output" class="text-dark h-100 w-100"  >
                                    
                            </div>
                            <h6>Vous pouvez modifier le message et envoyer </h6>
                                    <button class="btn btn-primary" onclick="push()"> Push</button>
                                    
                                        <textarea name="modifier" class="form-control mb-1" id="exampleFormControlTextarea1" rows="3"></textarea>
                                        <button  onclick="envoyer()" type="submit" class="btn btn-primary text-center">Valider</button>
                        </div>
                    </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body w-100 h-100">
                        <h4>Les messages envoyés</h4><hr>
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
                            content : 'ceci est le contenu du message',
                            dtcreated : '2021 07 15'
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
                                <div id="message${message.id}">
                                <div class="" >
                                    <small>${message.content} id${message.id}</small>
                                </div> 
                                <a href="javascript:send('${message.content}')"  class="btn btn-primary">Envoyer</a>
                                <a href="javascript:edit('${message.content}')"  class="btn btn-primary">Edit</a>
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
                </script> -->
@endsection