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
							<li class="breadcrumb-item active" aria-current="page">{{$utilisateur->nom. ' ' . $utilisateur->prenom}}</li>
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

<form action="{{route('utilisateurs.update', $utilisateur)}}" method="post" enctype="multipart/form-data">
    @method('patch')
    @csrf
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="nom">Nom  <strong class="text-danger">*</strong> </label>
                    <input type="text" class="form-control" name="nom" placeholder="Nom" id="nom"  value="{{$utilisateur->nom}}" required>
                        @error('nom')
                        <span class="helper-text red-text">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="email">Email <strong class="text-danger">*</strong></label>
                     <input type="email" class="form-control" name="email" placeholder="Email" id="email"  value="{{$utilisateur->email}}" required>
                     @error('email')
                     <span class="helper-text red-text">
                         <strong>{{ $message }}</strong>
                     </span>
                     @enderror
                    </div>

                    {{-- <div class="form-group">
                        <label class="form-label" for="organisation">Ville <strong class="text-danger">*</strong></label>
                        <select name="ville" id="" class="form-control custom-select select2">
                        <option value="{{$utilisateur->ville->id}}" selected disabled> {{$utilisateur->ville->nom}}</option>
                            @foreach ($villes as $ville)
                        <option value="{{$ville->id}}">{{$ville->nom}}</option>
                            @endforeach
                        </select>
                        @error('organisation')
                        <span class="helper-text red-text">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div> --}}
                    <div class="form-group">
                        <label class="form-label" for="organisation">Role <strong class="text-danger">*</strong></label>
                        <select name="role_id" id="" class="form-control custom-select select2">
                        <option value="{{$utilisateur->role->id}}" selected> {{$utilisateur->role->designation}}</option>

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
                        <label class="form-label" for="prenom">Prénom <strong class="text-danger">*</strong></label>
                        <input type="text" class="form-control" name="prenom" placeholder="Prénom" id="prenom"  value="{{$utilisateur->prenom}}" required>
                        @error('prenom')
                        <span class="helper-text red-text">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="input-group w-100 form-group">
                        <label class="form-label" for="tel">Téléphone <strong class="text-danger">*</strong></label>
                        <input class="form-control" id="phone" name="tel" type="tel"  value="{{$utilisateur->tel}}" required>
                        @error('tel')
                        <span class="helper-text red-text">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="nom">Fonction <strong class="text-danger">*</strong></label>
                        <input type="text" class="form-control" name="titre" placeholder="Fonction" id="titre"  value="{{$utilisateur->prenom}}" required>
                        @error('titre')
                        <span class="helper-text red-text">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    @if ($utilisateur->role->designation == 'Chef d’Unité' || $utilisateur->role->designation == 'Agent d’une Unité' )

                    <div class="form-group">
                        <label class="form-label" for="organisation">Unité <strong class="text-danger">*</strong></label>
                        <select name="unite_id" id="" class="form-control custom-select select2">
                        <option value="{{$utilisateur->unite->id}}" selected disabled> {{$utilisateur->unite->nom}} </option>

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
                    @endif

                </div>
                <div class="col-md-12 ">
                    <div class="card shadow">
                        <div class="card-header">
                            <h3 class="mb-0 card-title">Veuillez une photo de prole</h3>
                        </div>
                        <div class="card-body">
                            <input type="file" class="dropify" data-max-file-size="1M" name="profile_photo_path" accept="" />
                            @error('profile_photo_path')
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

    <a href="{{ URL::previous() }}" class="btn btn-primary"> <span>
            <i class="fe fe-close"></i>
        </span> Retour</a>

    </div>
</form>
@stop
@section('js')
<script src="{{URL::asset('assets/plugins/fileuploads/js/fileupload.js')}}"></script>
<script src="{{URL::asset('assets/plugins/fileuploads/js/file-upload.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/jquery.dataTables.min.js')}}"></script>

    <!-- INTERNALPRISM JS -->
    <script src="{{URL::asset('assets/plugins/prism/prism.js')}}"></script>
        <!-- INTERNAL TELEPHONE JS -->
    <script src="{{URL::asset('assets/plugins/telephoneinput/telephoneinput.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/telephoneinput/inttelephoneinput.js')}}"></script>
@stop
