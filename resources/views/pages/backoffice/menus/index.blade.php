
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
@push('livewire')
    @livewireStyles
@endpush
@section('page-header')
                <!-- PAGE-HEADER -->

				<div class="page-header">
					<div>
						<h1 class="page-title">Liste des rubriques</h1>
						<ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('accueil')}}">Accueil</a></li>
							<li class="breadcrumb-item active" aria-current="page">Rubriques</li>
						</ol>
                    </div>
					<div class="ml-auto pageheader-btn">
						@if (Auth::user()->role->id == 1 )
						<a class="btn btn-primary" href="{{route('menus.create')}}"  >  <span>
							<i class="fe fe-plus"></i>
						</span>
						Ajouter une rubrique</a>
							@else
							<a href="{{ route('menus.index') }}" class="btn btn-primary"> <span>
								<i class="fe fe-close"></i>
							</span><i class="fa fa-times"></i> Retour</a>
	
						@endif
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
								<h3 class="card-title">Les rubriques</h3>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									@if (count($menus) > 0)
                                    <table id="data-table1" class="table table-striped table-bordered text-nowrap w-100 table-sm">
										<thead>
											<tr>
												<th class="wd-15p">Désignation</th>
												<th class="wd-15p">Type</th>
												<th class="wd-15p">Opérateur</th>
                                                <th>Cacher</th>
											</tr>
										</thead>
										<tbody>
                                            @foreach ($menus as $menu) 


											<tr data-placement="top" title="Cliquer pour afficher les détails">
												<td> <a class="text-dark" href="{{route('menus.show', $menu->uuid)}}" data-toggle="tooltip" data-placement="top" title="Cliquer pour afficher les détails" > {{$menu->nom}} </a></td>
												<td> <a class="text-dark" href="{{route('menus.show', $menu->uuid)}}" data-toggle="tooltip" data-placement="top" title="Cliquer pour afficher les détails" >{{ucFirst($menu->type->nom)}} </a></td>
											<td> <a class="text-dark" href=" @if($menu->type_menu_id == 2) {{route('menus.show', $menu->parent->uuid)}}@else # @endif " data-toggle="tooltip" data-placement="top" title="Cliquer pour afficher les détails" >{{$menu->operateur}}</a></td>
												<td> 
           												 @livewire('cache',['menu' => $menu])

												</td>
												
                                            </tr>
                                            @endforeach

										</tbody>
									</table>
                                    @else
								<div class="text-center">

									<span>Aucune rubrique à afficher</span>
								</div>
                                    @endif
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
@push('livewirescript')
@livewireScripts
@endpush