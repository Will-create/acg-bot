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
						<h1 class="page-title">Liste des Opérateurs</h1>
						<ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('accueil')}}">Accueil</a></li>
							<li class="breadcrumb-item active" aria-current="page">Opérateurs</li>
						</ol>
					</div>
					<div class="ml-auto pageheader-btn">
                    <a class="btn btn-primary" href="{{route('operateurs.create')}}"  >  <span>
                            <i class="fe fe-plus"></i>
                            AJouter un Opérateur
                        </span>
                        </a>
					</div>
				</div>
				<!-- PAGE-HEADER END -->
@endsection
@section('content')
            <!-- ROW-1 OPEN -->
            <div class="row">
                   @foreach ($operateurs as $operateur)
                    <div class="col-sm-3">
                       <a href="{{ route('operateurs.show',$operateur->uuid) }}" data-toggle="tooltip" data-placement="top" title="Cliquer pour afficher les détails de {{$operateur->nom}}">
                        <div class="card">
                            <div class="card-header">
                                <div class="">
                                    <h3 class="card-title" >{{$operateur['nom']}}</h3>
                                
                                    <small> Pays : {{$operateur['pays']}} </small><br>
                                    
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="card-body wideget-user-contact">
                                <img src="{{asset('images').'/'.operateur_logo($menu->operateur)}}"
                                    style="min-width:100%; object-fit:cover; object-position: 50% 50%;" alt="" srcset="">
                                <div class="clearfix"></div>
    
    
                            </div>
                        </div>
                       </a>
                       </div>
                   @endforeach
            </div>
            <!-- ROW-1 CLOSED -->
@endsection