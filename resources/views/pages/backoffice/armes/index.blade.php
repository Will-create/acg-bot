
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
						<h1 class="page-title">Les Armes de crime</h1>
						<ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('accueil')}}">Accueil</a></li>
							<li class="breadcrumb-item active" aria-current="page">Les armes de crime</li>
						</ol>
					</div>
					<div class="ml-auto pageheader-btn">
                    <a class="btn btn-primary" href="{{route('armes.create')}}">  <span>
                            <i class="fe fe-plus"></i>
                        </span>
                    Ajouter une arme</a>


                    </button>

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
								<h3 class="card-title">Liste des armes de crime</h3>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table id="data-table1" class="table table-striped table-bordered text-nowrap w-100 table-sm">
										<thead>
											<tr>
												{{-- <th class="wd-15p">Photo</th> --}}
												<th class="wd-15p">Libellé</th>
												<th class="wd-15p">Réference</th>
												<th>Remarques</th>
											</tr>
										</thead>
										<tbody>
                                            @foreach ($armes as $arme)
											<tr>
												{{-- <td> <a class="text-dark" href="{{route('armes.show',  $arme->uuid)}}" data-toggle="tooltip" data-placement="top" title="Cliquer pour afficher les détails" > <div class="col-auto"><span class="avatar brround avatar-md d-block cover-image" data-image-src="{{asset('storage').'/'.$arme->photo}}"></span></div> </a></td> --}}
												<td> <a class="text-dark" href="{{route('armes.show',  $arme->uuid)}}" data-toggle="tooltip" data-placement="top" title="Cliquer pour afficher les détails" > {{$arme->libelle}} </a></td>
												<td> <a class="text-dark" href="{{route('armes.show',  $arme->uuid)}}" data-toggle="tooltip" data-placement="top" title="Cliquer pour afficher les détails" > {{$arme->reference}} </a></td>
												{{-- <td> <a class="text-dark" href="{{route('armes.show',  $arme->uuid)}}" data-toggle="tooltip" data-placement="top" title="Cliquer pour afficher les détails" >{{$arme->nom_scientifique}}</a></td> --}}
												<td> <a class="text-dark" href="{{route('armes.show',  $arme->uuid)}}" data-toggle="tooltip" data-placement="top" title="Cliquer pour afficher les détails" > {{substr($arme->remarques, 0, 60) }} </a></td>
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
@endsection
