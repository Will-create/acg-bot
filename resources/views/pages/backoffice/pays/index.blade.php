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
						<h1 class="page-title">Liste des Pays</h1>
						<ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('accueil')}}">Accueil</a></li>
							<li class="breadcrumb-item active" aria-current="page">Pays</li>
						</ol>
					</div>
					<div class="ml-auto pageheader-btn">
                    <a class="btn btn-primary" href="{{route('pays.create')}}"  >  <span>
                            <i class="fe fe-plus"></i>
                            AJouter un pays
                        </span>
                        </a>
					</div>
				</div>
				<!-- PAGE-HEADER END -->
@endsection
@section('content')
            <!-- ROW-1 OPEN -->
            <div class="row">
               
                   @foreach ($pays as $pay)
                  
                    <div class="col-sm-3">
                       <a href="{{ route('pays.show',$pay->uuid) }}" data-toggle="tooltip" data-placement="top" title="Cliquer pour afficher les détails de {{$pay->nom}}">
                        <div class="card">
                            <div class="card-header">
                                <div class="">
                                    <h3 class="card-title" >{{$pay->nom}}</h3>
                                
                                    <small>Code ISO 3 : {{$pay->codeiso3_pays_origine}} </small>
                                    
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="card-body wideget-user-contact">
                            <img src="{{asset('storage').'/'.$pay->icone}}"   style="min-width:100%; object-fit:cover; object-position: 50% 50%;" alt="" srcset="">
                            <div class="clearfix"></div>
                            </div>
                        </div>
                       </a>
                       </div>
                   @endforeach
            </div>
            <!-- ROW-1 CLOSED -->
@endsection