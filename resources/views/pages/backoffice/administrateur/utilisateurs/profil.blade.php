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

<form action="{{route('utilisateurs.update', $user)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('patch')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="nom">Nom  <strong class="text-danger">*</strong> </label>
                        <input type="text" class="form-control" name="nom" placeholder="Nom" id="nom"  value="{{$user->nom}}" required>
                        @error('nom')
                        <span class="helper-text red-text">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="prenom">Prénom <strong class="text-danger">*</strong></label>
                        <input type="text" class="form-control" name="prenom" placeholder="Prénom" id="prenom"  value="{{$user->prenom}}" required>
                        @error('prenom')
                        <span class="helper-text red-text">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="email">Email <strong class="text-danger">*</strong></label>
                        <input type="email" class="form-control" name="email" placeholder="Email" id="email"  value="{{$user->email}}" required>
                        @error('email')
                        <span class="helper-text red-text">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="  form-group">
                        <label class="form-label" for="tel">Téléphone <strong class="text-danger">*</strong></label>
                        <input class="form-control" id="pone" name="tel" type="tel"  value="{{$user->tel}}"  >
                        @error('tel')
                        <span class="helper-text red-text">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
<br> <br>
                <div class="col-md-6">
                    <h4>Photo de profil</h4>
                    <div class="profil-image-image-zone">
                        @if (Auth::user()->profile_photo_path)
                        <img src="{{asset('storage/'. Auth::user()->profile_photo_path)}}" alt="{{Auth::user()->nom. ' '. Auth::user()->prenom}}" class="user-prfil-image">
                        @else
                        <img src="{{asset('images/person.png')}}" alt="{{Auth::user()->nom. ' '. Auth::user()->prenom}}" class="user-prfil-image">

                        @endif
                    </div>
                </div>
                <div class="col-md-6 ">
                    <div class="card shadow">
                        <div class="card-header">
                            <h3 class="mb-0 card-title">Changer la photo de profil</h3>
                        </div>
                        <div class="card-body">
                            <input type="file" class="dropify" data-max-file-size="1M" name="profile_photo_path" accept=".png, .jpeg" />
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
    </div>
</form>
@endsection
