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

                        <h1 class="page-title">Liste des utilisateurs</h1>
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
                        <div class="card-body">
                            <div class="wideget-user text-center">
                                <div class="wideget-user-desc">
                                    <div class="wideget-user-img">
                                        <img class="" src="{{asset('storage/'. $utilisateur->profile_photo_path)}}" alt="img">
                                    </div>
                                    <div class="user-wrap">
                                    <h4 class="mb-1">{{ucfirst($utilisateur->nom). ' ' . ucFirst($utilisateur->prenom)}}</h4>
                                        <h6 class="text-muted mb-4">Ajouté le : {{formatDate($utilisateur->created_at)}}</h6>
@if ($utilisateur->actif == true)
<a  @if($utilisateur->id != Auth::user()->id &&  Auth::user()->role->designation == "Administrateur Général")  data-toggle="tooltip" data-placement="top" title="Cliquer pour désactiver"  href="{{route('gerer-utilisateur', $utilisateur)}}" @endif  class="btn btn-success mt-1 mb-1 btn-sm"  > <i class="zmdi zmdi-rss text-white"></i> Compte  activé </a>

@else

<a  @if($utilisateur->id != Auth::user()->id &&  Auth::user()->role->designation == "Administrateur Général") data-toggle="tooltip" data-placement="top" title="Cliquer pour désactiver"  href="{{route('gerer-utilisateur', $utilisateur)}}" @endif   class="btn btn-danger mt-1 mb-1 btn-sm"   > <i class="zmdi zmdi-rss text-white"></i>  Compte désacivé </a>
@endif
                                    <a  href="{{route('utilisateurs.edit', $utilisateur)}}" class="btn btn-primary mt-1 mb-1 btn-sm"> <i class="zmdi zmdi-edit text-white"></i>  Editer le profil </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <div class="float-left">
                                <h3 class="card-title">Contacts</h3>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="card-body wideget-user-contact">
                            <div class="media mb-5 mt-0">
                                <div class="d-flex mr-3">
                                    <span class="user-contact-icon bg-primary"><i class="fa fa-envelope text-white"></i></span>
                                </div>
                                <div class="media-body">
                                    <a href="#" class="text-dark">Email</a>
                                    <div class="text-muted fs-14">{{$utilisateur->email}}</div>
                                </div>
                            </div>

                            <div class="media mb-0 mt-0">
                                <div class="d-flex mr-3">
                                    <span class="user-contact-icon bg-warning"><i class="fa fa-phone text-white"></i></span>
                                </div>
                                <div class="media-body">
                                    <a href="#" class="text-dark">Téléphone</a>
                                    <div class="text-muted fs-14">{{formatel($utilisateur->tel)}}</div>
                                </div>
                            </div>
                        </div>
                    </div>


                    @if ($utilisateur->id != Auth::user()->id)
                    <button type="button" class="btn btn-outline-danger btn-block  mb-1" data-toggle="modal" data-target="#exampleModalDelete{{$utilisateur->id}}"><i class="fa fa-trash"></i> Supprimer le compte</button>
                    @endif
                    <div class="modal" id="exampleModalDelete{{$utilisateur->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalDelete" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalDelete">Suppression de utilisateur  <span class="text-success"> {{$utilisateur->nom. ' '. $utilisateur->prenom}}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>  Voullez-vous supprimer cet utilisateur ?
                                    </p>
                                </div>
                                <div class="modal-footer">
                                    <form action="{{route('utilisateurs.destroy', $utilisateur)}}" method="POST">
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
                <div class="col-lg-8">

                    <div class="tab-content">
                        <div class="tab-pane active show" id="tab-51">
                            <div class="card">
                                <div class="card-body">
                                    <div id="profile-log-switch">
                                        <div class="media-heading">
                                            <h5><strong>Informations personnelles</strong></h5>
                                        </div>
                                        <div class="table-responsive ">
                                            <table class="table row table-borderless">
                                                <tbody class="col-lg-6 col-xl-6 p-0">
                                                    <tr>
                                                        <td><strong>Nom :</strong> {{Ucfirst($utilisateur->nom)}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Prénom :</strong> {{Ucfirst($utilisateur->prenom)}}</td>
                                                    </tr>

                                                    <tr>
                                                        <td><strong>Email :</strong> {{$utilisateur->email}}</td>
                                                    </tr>
                                                    <tr>
                                                    <td><strong>Role :</strong> {{$utilisateur->role->designation}}</td>
                                                    </tr>


                                                </tbody>
                                                <tbody class="col-lg-6 col-xl-6 p-0">
                                                     <tr>
                                                        <td><strong>Téléphone :</strong> {{ ($utilisateur->tel)}} </td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Pays :</strong> {{Ucfirst($utilisateur->pays->nom)}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Localité :</strong> {{Ucfirst($utilisateur->localite->nom)}}</td>
                                                    </tr>

                                                      @if ($utilisateur->unite_id)
                                                    <tr>
                                                        <td>  <strong>Unité :</strong> <a href="{{route('unites.show', $utilisateur->uniteagent->uuid)}}" class="text-dark" data-toggle="tooltip" data-placement="top" title="Voir les détails de l'unité">     {{$utilisateur->uniteagent->designation}} </a></td>
                                                        </tr>
                                                    @else
                                                     <tr>
                                                    <td><strong>Unité :</strong> Auncune unité </td>
                                                    </tr>
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="tab-content">
                        <div class="tab-pane active show" id="tab-51">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row profie-img">
                                        <div class="col-md-12">
                                            <div class="media-heading">
                                                <h5><strong>Biographie</strong></h5>
                                            </div>
                                            <p>
                                                Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus</p>
                                            <p class="mb-0">because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter but because those who do not know how to pursue consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div><!-- COL-END -->
            </div>
            <!-- ROW-1 CLOSED -->
@endsection
