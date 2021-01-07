@extends('layouts.master4')
@section('css')
        <!-- INTERNAL SELECT2 CSS -->
		<link href="{{URL::asset('assets/plugins/fileuploads/css/fileupload.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{URL::asset('assets/plugins/select2/select2.min.css')}}" rel="stylesheet" />
		<!-- INTERNAL  DATA TABLE CSS-->
		<link href="{{URL::asset('assets/plugins/datatable/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
		<link href="{{URL::asset('assets/plugins/datatable/responsivebootstrap4.min.css')}}" rel="stylesheet" />
        <link href="{{URL::asset('assets/plugins/datatable/fileexport/buttons.bootstrap4.min.css')}}" rel="stylesheet" />
          <!-- INTERNAL PRISM CSS -->
          <link href="{{URL::asset('assets/plugins/prism/prism.css')}}" rel="stylesheet">
          	<!-- INTERNAL TELEPHONE CSS-->
		<link rel="stylesheet" href="{{URL::asset('assets/plugins/telephoneinput/telephoneinput.css')}}">
@endsection
@section('page-header')
                <!-- PAGE-HEADER -->
                @include('partials._notification')
				<div class="page-header">
					<div>
			            <h1 class="page-title">Détails d'un auteur de crime</h1>
						<ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('accueil')}}">Accueil</a></li>
                        <li class="breadcrumb-item" aria-current="page"><a href="{{route('crime_auteurs.index')}}">Auteurs de crime</a></li>
							<li class="breadcrumb-item active" aria-current="page">{{$auteur->nom}} {{$auteur->prenom}}</li>
						</ol>
					</div>
					<div class="ml-auto pageheader-btn">
                    <a class="btn btn-primary" href="{{route('crime_auteurs.index')}}"><span>
                            <i class="fe fe-list"></i>
                        </span>
                        Tous les auteurs de crimes</a>
                    </button>
					</div>
				</div>
				<!-- PAGE-HEADER END -->
@endsection
@section('content')
            <!-- ROW-1 OPEN -->
            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div id="profile-log-switch">
                                <div class="media-heading">
                                    <h5><strong>Informations personnelles</strong></h5>
                                </div>
                                <div class="table-responsive ">
                                    <table class="table row table-borderless">
                                        <tbody class="col-lg-12 col-xl-6 p-0">
                                            <tr>
                                                <td><strong>Nom :</strong> {{Ucfirst($auteur->nom)}}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Prénom :</strong>{{Ucfirst($auteur->prenom)}}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Genre :</strong> {{$auteur->genre}}</td>
                                            </tr>
                                            <tr>
                                            <td><strong>Date de naissance :</strong> {{$auteur->date_naiss}}</td>
                                            </tr>
                                            {{-- <tr>
                                                <td><strong>Pays/Localité :</strong> {{$auteur->pays->nom}} {{$auteur->localite->nom}}</td>
                                                </tr> --}}
                                        </tbody>
                                        <tbody class="col-lg-12 col-xl-6 p-0">
                                            <tr>
                                                <td><strong>Nationalité :</strong> {{Ucfirst($auteur->nationalite)}}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Adresse :</strong> {{formatel($auteur->adresse)}} </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-8">
                    <div class="tab-content">
                        <div class="tab-pane active show" id="tab-51">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="page-title">Autres commentaires  du même crime</h3>
                                    @foreach($autres as $autre)
                                    @if ($autre->id != $commentaire->id)
                                    <div class="d-flex flex-row comment-row m-t-0">
                                        <a class="text-dark" href="{{ route('utilisateurs.show', $autre->auteur->uuid) }}" data-toggle="tooltip" data-placement="top" title="{{$autre->auteur->nom}} {{$autre->auteur->prenom}}({{$autre->auteur->role->designation}})">
                                            <div class="p-2"><img   src="{{asset('storage/'. $autre->auteur->profile_photo_path)}}" alt="user" height="40" width="50" class="rounded-circle"></div>
                                        </a> <br>
                                        <div class="comment-text w-100">
                                            <div class="comment-footer"><a class="text-dark" href="{{route('crime_auteurs.show', $autre->uuid)}}"><span class="m-b-15 d-block" style="background-color: rgb(241, 255, 251); border-radius:.5em; padding:1em; text-align:center;">{{ substr($autre->commentaire, 0,125) }}<span class="text-muted float-right">{{$autre->created_at->format(' d M Y h:i:s')}}</span> </span> </a><a class="text-dark float-right" href="{{route('utilisateurs.show', $autre->destinataire->uuid)}}">Pour: {{$autre->destinataire->nom}} {{$autre->destinataire->prenom}}({{$autre->destinataire->role->designation}})</a> </div>
                                        </div>
                                    </div>
                                    <hr>
                                    @endif
                                    @if ($autres->count() == 1)
                                    <span class="">Aucun autre commentaire n'est disponible que celui-la</span>
                                    @endif

                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- COL-END -->
            </div>
            <div class="row">
                <div class="col-md-6"></div>
                <div class="col-md-6 mb-4">
                    <a href="{{ route('crime_auteurs.index') }}" class="btn btn-dark"> <span>
                            <i class="fe fe-close"></i>
                        </span><i class="fa fa-times"></i> Retour</a>
                    <a href="{{ route('crime_auteurs.edit', $commentaire->uuid) }}" class="btn btn-primary">
                        <i class="fa fa-edit"></i> Modifier</a>
                    <button type="button" class="btn btn-danger  mb-1" data-toggle="modal"
                        data-target="#exampleModalDelete{{ $commentaire->id }}"><i class="fa fa-trash"></i> Supprimer</button>
                </div>
            </div>
            <div class="modal" id="exampleModalDelete{{ $commentaire->id }}" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalDelete" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalDelete">Suppression de {{ $commentaire->id }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p> Etes-vous sûr de vouloir supprimer ce commentaire ?
                            </p>
                        </div>
                        <div class="modal-footer">
                            <form action="{{ route('crime_auteurs.destroy', $commentaire->uuid) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger ">
                                    <i class="fa fa-trash"></i>
                                    <span>Confirmer</span>
                                </button>
                                <button type="reset" class="btn btn-success" data-dismiss="modal">
                                    <i class="fa fa-times"></i>
                                    <span>Annuler</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ROW-1 CLOSED -->
@endsection
