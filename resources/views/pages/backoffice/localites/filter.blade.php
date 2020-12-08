
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
                
				<div class="page-header">
					<div>
						<h1 class="page-title" id="page-title">Liste des localités dans {{$pay->nom}}</h1>
						<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{route('accueil')}}">Accueil</a></li>
						<li class="breadcrumb-item" aria-current="page"><a href="{{route('pays.index')}}">Pays</a></li>
						<li class="breadcrumb-item" aria-current="page"><a href="{{route('localites.index')}}">Localités</a></li>
							<li class="breadcrumb-item active" aria-current="page">Localités dans {{$pay->nom}}</li>
						</ol>
					</div>
					<div class="ml-auto pageheader-btn">
                    <a class="btn btn-primary" href="{{route('localites.create')}}"  >  <span>
                            <i class="fe fe-plus"></i>
                        </span>
						Ajouter une localité</a>
						

                    </button>

					</div>
				</div>
				<!-- PAGE-HEADER END -->
@endsection
@section('content')
@include('partials._notification')
			            <!-- ROW-1 OPEN -->
						<div class="row">
							<div class="col-lg-3">
							   
								<div class="card">
									<div class="card-header">
										<div class="float-left">
											<h3 class="card-title">Liste de tous les pays</h3>
										</div>
										<div class="clearfix"></div>
									</div>
									<div id="listpays" class="card-body side-menu" style="height:55vh;overflow-y: scroll">
										@foreach ($pays as $p)
				
				
															
												<a style="cursor:pointer" onclick="filtreur({{$p->id}})" class="side-menu__item {{$p->id == $pay->id ? 'active' : ''}}">
																	 
												<span class="side-menu__label">{{$p->nom}} </span>
												
												</a>
																 
											@endforeach
									</div>
								</div>
							</div>
							<div class="col-lg-9">
							<div id="loader" class="d-none">
                                    <div class="loader"></div>
                                </div>
			
								<div class="row">
									<div id="aire_proteger_content" class="col-md-12 col-lg-12">
										<div class="card">
											<div class="card-header">
												<h3 class="card-title">Les localités de {{$pay->nom}} </h3>
											</div>
											<div class="card-body">
												<div class="table-responsive">
													<table id="data-table1" class="table table-striped table-bordered text-nowrap w-100 table-sm">
														<thead>
															<tr>
																<th class="wd-15p">Nom</th>
																
																<th class="wd-20p">Pays</th>
																
																{{-- <th>Actions</th> --}}
															</tr>
														</thead>
														<tbody id="tableBody" >
															@foreach ($localites as $localite)
				
				
															<tr>
																<td> <a class="text-dark" href="{{route('localites.show', $localite->uuid)}}" data-toggle="tooltip" data-placement="top" title="Cliquer pour afficher les détails" > {{$localite->nom}} </a></td>
																<td> <a class="text-dark" href="{{route('localites.show', $localite->uuid)}}" data-toggle="tooltip" data-placement="top" title="Cliquer pour afficher les détails" >{{$localite->pay->nom}}</a></td>
																
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
							</div><!-- COL-END -->
						</div>
						<div class="modal-footer">
							
							
							
							
						<a href="{{ URL::previous() }}" class="btn btn-primary"> <span>
								<i class="fe fe-close"></i>
							</span> Retour</a>
						
						</div>
						<!-- ROW-1 CLOSED -->

				<!-- ROW-1 OPEN -->
			
			 {{-- @include('pages.backOffice.administrateur.utilisateurs._modelCreationUtilisateur') --}}



@endsection
@section('js')
     <!-- INTERNAL  DATA TABLE JS-->
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
		var tableBody = document.getElementById('tableBody');	
		var pageTitle = document.getElementById('page-title');
		var listpays = document.getElementById('listpays')	;									
		function injecteur(res){
			var {localites, pays, pay} = res;
			var lignes = '';
			var rows = '';
			localites.map(function(lo){
            rows +='<tr><td> <a class="text-dark" href="/localites/'+lo.uuid+'" data-toggle="tooltip" data-placement="top" title="Cliquer pour afficher les détails" > '+lo.nom+' </a></td><td> <a class="text-dark" href="/localites/'+lo.uuid+'" data-toggle="tooltip" data-placement="top" title="Cliquer pour afficher les détails" >'+lo.pay.nom+' </a></td></tr>';
			})
			pays.map(function(p){
				var active = p.id == pay.id ? 'active' : '' ;
              lignes +='<a style="cursor:pointer" onclick="filtreur('+p.id+')" class="side-menu__item '+active+'"><span class="side-menu__label">'+p.nom+' </span></a>'
			})
			tableBody.innerHTML = rows;
			listpays.innerHTML = lignes;
			pageTitle.innerHTML = 'Liste des localités dans '+pay.nom;
			 $('#loader').toggleClass('d-none');
        $('#aire_proteger_content').show();
			
		}
		function filtreur(pays){
			 $('#loader').toggleClass('d-none');
            $('#aire_proteger_content').hide();
			event.preventDefault();
 			 axios.get('/localites/api/filtreur/'+pays).then(function(data){
														var res = data.data;
													injecteur(res);})
        }
        </script>
@endsection
