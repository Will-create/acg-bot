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
						<h1 class="page-title">Liste des utilisateurs</h1>
						<ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('accueil')}}">Accueil</a></li>
							<li class="breadcrumb-item active" aria-current="page">utilisateurs</li>
						</ol>
					</div>
					<div class="ml-auto pageheader-btn">
                    <a class="btn btn-primary" href="{{route('utilisateurs.create')}}"  >  <span>
                            <i class="fe fe-plus"></i>
                        </span>
                        Ajouter un utilisateur</a>


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
								<h3 class="card-title">Liste des utilisateurs</h3>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table id="data-table1" class="table table-striped table-bordered text-nowrap w-100 table-sm">
										<thead>
											<tr>
												<th class="wd-15p">Nom</th>
												<th class="wd-15p">Prénom</th>
												<th class="wd-20p">Email</th>
												<th class="wd-20p">Role</th>
												<th class="wd-15p">Téléphone</th>
                                                {{-- <th>Actions</th> --}}
											</tr>
										</thead>
										<tbody>
                                            @foreach ($utilisateurs as $utilisateur)

											<tr>
												<td>{{$utilisateur->nom}}</td>
												<td>{{$utilisateur->prenom}}</td>
												<td>{{$utilisateur->email}}</td>
												<td>{{$utilisateur->role->designation}}</td>
												<td>{{$utilisateur->tel}}</td>
                                                {{-- <td>
                                                <a href="{{route('utilisateurs.show', $utilisateur->uuid)}}" class="btn btn-primary btn-sm text-white mb-1"><i class="fa fa-eye"></i>

                                                    </a>
                                                <button class="btn btn-warning btn-sm text-white mb-1" data-toggle="modal" data-target="#largeModalDisplay{{$utilisateur->id}}">
                                                     <i class="fa fa-edit"></i>
                                                </button>
                                                <div id="largeModalDisplay{{$utilisateur->id}}" class="modal">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content ">
                                                            <div class="modal-header pd-x-20">
                                                                <h6 class="modal-title text-center">{{$utilisateur->nom. ' '. $utilisateur->prenom}} </h6>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body pd-20">
                                                                <div class="row">
                                                                    <div class="col-md-12">

                                                                    <form action="{{route('utilisateurs.update', $utilisateur)}}" method="post" enctype="multipart/form-data">
                                                                        @csrf
                                                                        @method('patch')
                                                                    <input type="hidden" name="utilisateur_id" value="">
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <div class="row">
                                                                                    <div class="col-md-6">
                                                                                        <div class="form-group">
                                                                                            <label class="form-label" for="nom">Nom</label>
                                                                                            <input type="text" class="form-control" name="nom" placeholder="Nom" id="nom"  value="{{$utilisateur->nom}}">
                                                                                            @error('nom')
                                                                                            <span class="helper-text red-text">
                                                                                                <strong>{{ $message }}</strong>
                                                                                            </span>
                                                                                            @enderror
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label class="form-label" for="email">Email</label>
                                                                                        <input type="email" class="form-control" name="email" placeholder="Email" id="email"  value="{{$utilisateur->email}}">
                                                                                         @error('email')
                                                                                         <span class="helper-text red-text">
                                                                                             <strong>{{ $message }}</strong>
                                                                                         </span>
                                                                                         @enderror
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label class="form-label" for="organisation">Organisation</label>
                                                                                        <input type="text" class="form-control" name="organisation" placeholder="Organisation"  value="{{$utilisateur->organisation}}" id="organisation">
                                                                                            @error('organisation')
                                                                                            <span class="helper-text red-text">
                                                                                                <strong>{{ $message }}</strong>
                                                                                            </span>
                                                                                            @enderror
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <div class="form-group">
                                                                                            <label class="form-label" for="prenom">Prénom</label>
                                                                                            <input type="text" class="form-control" name="prenom" placeholder="Prénom"  id="prenom"  value="{{$utilisateur->prenom}}">
                                                                                            @error('prenom')
                                                                                            <span class="helper-text red-text">
                                                                                                <strong>{{ $message }}</strong>
                                                                                            </span>
                                                                                            @enderror
                                                                                        </div>

                                                                                    <div class="form-group">
                                                                                        <label class="form-label" for="tel">Téléphone</label>
                                                                                        <input type="number" class="form-control " min="0" name="tel" id="tel" placeholder="Téléphone" value="{{$utilisateur->tel}}">
                                                                                        @error('tel')
                                                                                        <span class="helper-text red-text">
                                                                                            <strong>{{ $message }}</strong>
                                                                                        </span>
                                                                                        @enderror
                                                                                    </div>
                                                                                        <div class="form-group">
                                                                                            <label class="form-label" for="num_cnib">Référence du document d'identification</label>
                                                                                            <input type="text" class="form-control" name="num_cnib" id="num_cnib" placeholder="Numéro d'identification"  value="{{$utilisateur->num_cnib}}">
                                                                                            @error('num_cnib')
                                                                                            <span class="helper-text red-text">
                                                                                                <strong>{{ $message }}</strong>
                                                                                            </span>
                                                                                            @enderror
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-12 ">
                                                                                        <div class="card shadow">
                                                                                            <div class="card-header">
                                                                                                <h3 class="mb-0 card-title">Veuillez importer le document d'identification</h3>
                                                                                            </div>
                                                                                            <div class="card-body">
                                                                                            <img src="{{asset('storage/'. $utilisateur->photo_cnib)}}" alt="">
                                                                                                <input type="file" class="dropify" data-max-file-size="1M" name="photo_cnib" accept=".pdf" />
                                                                                                @error('photo_cnib')
                                                                                            <span class="helper-text red-text">
                                                                                                <strong>{{ $message }}</strong>
                                                                                            </span>
                                                                                            @enderror
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="submit" class="btn btn-primary"> <span>
                                                                                <i class="fe fe-save"></i>
                                                                            </span> Mettre à jour</button>
                                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">
                                                                                <span>
                                                                                    <i class="fa fa-close"></i>

                                                                                </span>Fermer</button>
                                                                        </div>
                                                                    </form>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div><!-- MODAL DIALOG -->
                                                </div>


                                            <button type="button" class="btn btn-danger btn-sm text-white mb-1" data-toggle="modal" data-target="#exampleModalDelete{{$utilisateur->id}}"><i class="fa fa-trash"></i></button>

                                                    <!-- MODAL -->
                                                    <div class="modal" id="exampleModalDelete{{$utilisateur->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalDelete" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalDelete">Suppression du utilisateur  <span class="green-text"> {{$utilisateur->nom. ' '. $utilisateur->prenom}}</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">×</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>  Voullez-vous supprimer ce utilisateur ?
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
                                                                            <i class="fa fa-trash"></i>
                                                                                        <span>Annuler</span>
                                                                        </button>
                                                                        </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- MODAL CLOSED -->

                                                </td> --}}
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
