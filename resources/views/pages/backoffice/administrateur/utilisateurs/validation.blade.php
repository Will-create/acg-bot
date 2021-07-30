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
                   @if (Auth::user()->role->designation == "Administrateur Général")

                        <h1 class="page-title">Le message à valider</h1>
                        @endif
						<ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('accueil')}}">Accueil</a></li>
							<li class="breadcrumb-item active" aria-current="page">{{$utilisateur->nom. ' ' .$utilisateur->prenom}}</li>
						</ol>
					</div>
					<div class="ml-auto pageheader-btn">
                   @if (Auth::user()->role->designation == "Administrateur Général")
                   <a class="btn btn-primary" href="{{route('utilisateurs.index')}}" data-toggle="tooltip" data-placement="top" title="Revenir sur la liste des utilisateurs">  <span>
                    <i class="fe fe-list"></i>
                </span>
                Les utilisateurs
            </a>
                   @endif
					</div>
				</div>
				<!-- PAGE-HEADER END -->
@endsection
@section('content')
            <!-- ROW-1 OPEN -->
             <div class="row">
                <div class="col-lg-4">
                   
                    <div class="card">
                        <div class="card-header">
                            <div class="float-left">
                                <h3 class="card-title">Messages</h3>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="card-body wideget-user-contact">
                            <div class="media mb-5 mt-0">
                                <div class="d-flex mr-3">
                                    <span class="user-contact-icon bg-primary"><i class="fa fa-envelope text-white"></i></span>
                                </div>
                                <div class="media-body">
                                    <a href="#" class="text-dark">Message arriver</a>
                                    <div class="text-muted fs-14"><p>{{$validations->message_arriver}}</p></div>
                                </div>
                            </div>
                            <div class="media mb-0 mt-0">
                                <div class="d-flex mr-3">
                                    <span class="user-contact-icon bg-warning"><i class="fa fa-phone text-white"></i></span>
                                </div>
                                <div class="media-body">
                                    <form action="route('validation.update', $validation)" method="post">
                                        @csrf
                                        @method('PATCH')
                                    <div class="text-muted fs-14"><textarea  id=""  rows="3">{{$validations->message_arriver}}</textarea></div>
                                    <button class="btn btn-success">Envoyer</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if ($utilisateur->id != Auth::user()->id)
                    <button type="button" class="btn btn-outline-danger btn-block  mb-1" data-toggle="modal" data-target="#exampleModalDelete{{$validation->id}}"><i class="fa fa-trash"></i> Supprimer le compte</button>
                    @endif
                    <div class="modal" id="exampleModalDelete{{$utilisateur->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalDelete" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalDelete">Suppression du message  <span class="text-success"> {{$validation->message_arriver}}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>  Voullez-vous supprimer cet message ?
                                    </p>
                                </div>
                                <div class="modal-footer">
                                    <form action="{{route('validation/{validation} ', $validation)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger ">
                                            <i class="fa fa-trash"></i>
                                        <span>Confirmer la suppression</span>
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
                </div>
                </div><!-- COL-END -->
            </div>
            <!-- ROW-1 CLOSED -->
@endsection
