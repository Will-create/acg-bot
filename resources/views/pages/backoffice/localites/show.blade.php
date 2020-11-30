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
						<h1 class="page-title">Liste des Localités</h1>
						<ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('accueil')}}">Accueil</a></li>
							<li class="breadcrumb-item active" aria-current="page">{{$localite->nom}}</li>
						</ol>
					</div>
					<div class="ml-auto pageheader-btn">
                    <a class="btn btn-primary" href="{{route('localites.index')}}"  >  <span>
                            <i class="fe fe-list"></i>
                        </span>
                        Toutes les localites</a>
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
                                <h3 class="card-title">localite de {{$localite->nom}}</h3>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="card-body wideget-user-contact">
                            
                            
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
                                            <h5><strong>Details de {{$localite->nom}}</strong></h5>
                                        </div>
                                        

                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                    
                </div><!-- COL-END -->
            </div>
            <div class="row">
                <div class="col-md-6"></div>
                <div class="col-md-6 mb-4">
                 <button type="button" class="btn btn-danger  mb-1" data-toggle="modal" data-target="#exampleModalDelete{{$localite->id}}"><i class="fa fa-trash"></i> Supprimer le type d'unité</button>
 
                 <a href="{{route('localites.edit',$localite->uuid)}}" class="btn btn-primary">
                     Modifier cette localité</a>
 
             <a href="{{ URL::previous() }}" class="btn btn-primary"> <span>
                     <i class="fe fe-close"></i>
                 </span> Retour</a>
 
                </div>
            </div>
 
 
<div class="modal" id="exampleModalDelete{{$localite->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalDelete" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalDelete">Suppression de localité</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <p>  Voullez-vous supprimer cette localité ?
                </p>
            </div>
            <div class="modal-footer">
                <form action="{{route('localites.destroy', $localite->uuid)}}" method="POST">
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
@endsection
