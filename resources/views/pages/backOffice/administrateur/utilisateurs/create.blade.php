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
							<li class="breadcrumb-item active" aria-current="page">Nouveau</li>
						</ol>
					</div>
					<div class="ml-auto pageheader-btn">
                    <a class="btn btn-primary" href="{{route('utilisateurs.index')}}"  >  <span>
                            <i class="fe fe-list"></i>
                        </span>
                        Les utilisateurs</a>
                    </button>

					</div>
				</div>
				<!-- PAGE-HEADER END -->
@endsection
@section('content')

<form action="{{route('utilisateurs.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="nom">Nom</label>
                        <input type="text" class="form-control" name="nom" placeholder="Nom" id="nom"  value="{{old('nom')}}" required>
                        @error('nom')
                        <span class="helper-text red-text">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="email">Email</label>
                     <input type="email" class="form-control" name="email" placeholder="Email" id="email"  value="{{old('email')}}" required>
                     @error('email')
                     <span class="helper-text red-text">
                         <strong>{{ $message }}</strong>
                     </span>
                     @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="organisation">Ville</label>
                        <select name="ville" id="" class="form-control custom-select select2">
                            @foreach ($villes as $ville)
                        <option value="{{$ville->id}}">{{$ville->designation}}</option>
                            @endforeach
                        </select>
                        @error('organisation')
                        <span class="helper-text red-text">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="organisation">Role</label>
                        <select name="role_id" id="" class="form-control custom-select select2">
                            @foreach ($roles as $role)
                        <option value="{{$role->id}}">{{$role->designation}}</option>
                            @endforeach
                        </select>
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
                        <input type="text" class="form-control" name="prenom" placeholder="Prénom" id="prenom"  value="{{old('prenom')}}" required>
                        @error('prenom')
                        <span class="helper-text red-text">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="input-group w-100 form-group">
                        <label class="form-label" for="tel">Téléphone</label>
                        <input class="form-control" id="phone" name="tel" type="tel"  value="{{old('tel')}}" required>
                        @error('tel')
                        <span class="helper-text red-text">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="nom">Fonction</label>
                        <input type="text" class="form-control" name="titre" placeholder="Fonction" id="titre"  value="{{old('titre')}}" required>
                        @error('titre')
                        <span class="helper-text red-text">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="organisation">Unité</label>
                        <select name="unite_id" id="" class="form-control custom-select select2">
                            @foreach ($unites as $unite)
                        <option value="{{$unite->id}}">{{$unite->designation}}</option>
                            @endforeach
                        </select>
                        @error('organisation')
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
        </span> Enregistrer</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">
            <span>
                <i class="fa fa-close"></i>

            </span>Fermer</button>
    </div>
</form>
@stop
@section('js')

    <!-- INTERNALPRISM JS -->
    <script src="{{URL::asset('assets/plugins/prism/prism.js')}}"></script>
        <!-- INTERNAL TELEPHONE JS -->
    <script src="{{URL::asset('assets/plugins/telephoneinput/telephoneinput.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/telephoneinput/inttelephoneinput.js')}}"></script>
@stop
