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
						<h1 class="page-title">Liste des Espèces Animales</h1>
						<ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('accueil')}}">Accueil</a></li>
							<li class="breadcrumb-item active" aria-current="page">{{$espece->nom}}</li>
						</ol>
					</div>
					<div class="ml-auto pageheader-btn">
                    <a class="btn btn-primary" href="{{route('espece_animales.index')}}"  >  <span>
                            <i class="fe fe-list"></i>
                        </span>
                        Toutes les Espèces Animales</a>
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
                                <h3 class="card-title">{{$espece->nom}}</h3>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="card-body wideget-user-contact">
                            
                            
                            <img src="{{asset('storage').'/'.$espece->photo}}" style="min-width:100%; object-fit:cover; object-position: 50% 50%;" alt="" srcset="">
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
                                            <h5><strong>Details de {{$espece->nom}}</strong></h5>
                                        </div>
                                        <strong>Famille :</strong> {{$espece->famille}}
                                                <br><br>
                                        <strong>Nom Scientifique :</strong> {{$espece->nom_scientifique}}
                                                <br><br>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                    
                </div><!-- COL-END -->
            </div>
            <div class="modal-footer">
                <form method="POST" action="{{route('espece_animales.destroy',$espece->uuid)}}" onsubmit="return confirm('Voulez vous vraiment supprimer cette Espèce?')">
                {{ csrf_field() }}
                    @method('DELETE')
                    <button class="btn btn-danger">
                    Supprimer cette Espèce Animale
                    </button>
                
                </form>
                
                
                <a href="{{route('espece_animales.edit',$espece->uuid)}}" class="btn btn-primary">
                    Modifier cette Espèce Animale</a>
            
            <a href="{{ URL::previous() }}" class="btn btn-primary"> <span>
                    <i class="fe fe-close"></i>
                </span> Retour</a>
            
            </div>
            <!-- ROW-1 CLOSED -->
@endsection
