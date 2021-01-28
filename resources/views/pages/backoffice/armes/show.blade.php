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
			            <h1 class="page-title">Détails d'une Arme de crime</h1>
						<ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('accueil')}}">Accueil</a></li>
                        <li class="breadcrumb-item" aria-current="page">
                            <a href="{{route('armes.index')}}">Armes de crime</a></li>
							<li class="breadcrumb-item active" aria-current="page">{{$arme->nom}}</li>
						</ol>
					</div>
					<div class="ml-auto pageheader-btn">
                        <a class="btn btn-primary" href="{{ route('crimes.show', $arme->crime ? $arme->crime->uuid : $crimeUuid) }}"> <span>
                            <i class="fe fe-list"></i>
                        </span> Revenir au crime</a>
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
                        <div class="card-header">
                            <div class="float-left">
                                <h3 class="card-title">{{ucFirst($arme->libelle)}}</h3>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="card-body wideget-user-contact">
                            <img src="{{asset('storage/'.$arme->photo)}}" style="min-width:100%; object-fit:cover; object-position: 50% 50%;" alt="" srcset="">
                                <br><br>
                            <div  id="profile-log-switch">
                                <dl class="dl">
                                    <dt>Reference:</dt>
                                    <dd> {{$arme->reference}} </dd>
                                    <dt>Remarques:</dt>
                                    <dd> {{$arme->remarques}}
                                    </dd>
                                    <dt>Crime :</dt>
                                    <dd>  <a class="text-dark" href="{{route('crimes.show', $arme->crime->uuid)}}">{{ucFirst($arme->crime->type ? $arme->crime->type->nom . ' à    '. $arme->crime->localite->nom : '' )}}</a></dd>
                                </dl>
                                        <br><br>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="tab-content">
                        <div class="tab-pane active show" id="tab-51">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="page-title">Autres armes du même crime</h3>
                                    @foreach($autres as $autre)
                                    @if ($autre->id != $arme->id)
                                    <a class="text-dark" href="{{ route('armes.show', $autre->uuid) }}" data-toggle="tooltip" data-placement="top" title="Cliquer pour afficher les détails" >
                                        <span class="">{{ $autre->libelle}}</span>
                                    </a> <br>
                                    @endif
                                    @if ($autres->count() == 1)
                                    <span class="">Aucune autre arme n'est utilisée que celle-la</span>
                                    @endif

                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- COL-END -->
            </div>
   @if (Auth::user()->role->designation == "Chef d’Unité" || Auth::user()->role->designation == "Agent d’une Unité")

            <div class="row">
                <div class="col-md-6"></div>
                <div class="col-md-6 mb-4">
                    <a href="{{ route('armes.index') }}" class="btn btn-dark"> <span>
                            <i class="fe fe-close"></i>
                        </span><i class="fa fa-times"></i> Retour</a>

                    <a href="{{ route('armes.edit', $arme->uuid) }}" class="btn btn-primary">
                        <i class="fa fa-edit"></i> Modifier</a>

                    <button type="button" class="btn btn-danger  mb-1" data-toggle="modal"
                        data-target="#exampleModalDelete{{ $arme->id }}"><i class="fa fa-trash"></i> Supprimer</button>
                </div>
            </div>
            @endif
            <div class="modal" id="exampleModalDelete{{ $arme->id }}" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalDelete" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalDelete">Suppression de {{ $arme->nom }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p> Etes-vous sûr de vouloir supprimer cette arme de crime ?
                            </p>
                        </div>
                        <div class="modal-footer">
                            <form action="{{ route('armes.destroy', $arme->uuid) }}" method="POST">
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

