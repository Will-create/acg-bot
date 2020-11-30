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
                        <label class="form-label" for="nom">Nom  <strong class="text-danger">*</strong> </label>
                        <input type="text" class="form-control" name="nom" placeholder="Nom" id="nom"  value="{{old('nom')}}" required>
                        @error('nom')
                        <span class="helper-text red-text">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="email">Email <strong class="text-danger">*</strong></label>
                     <input type="email" class="form-control" name="email" placeholder="Email" id="email"  value="{{old('email')}}" required>
                     @error('email')
                     <span class="helper-text red-text">
                         <strong>{{ $message }}</strong>
                     </span>
                     @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="pays_id">Pays <strong class="text-danger">*</strong></label>
                        <select name="pay_id" id="pays_id" class="form-control custom-select select2" onchange="show_ville()">
                            @if (Auth::user()->role->designation == 'Chef d’Unité' || Auth::user()->role->designation == 'Coordonnateur National')
                        <option value="{{$pays->id}}" selected  > {{$pays->nom}}</option>
                            @else
                            <option value="" selected disabled> Sélectionner</option>
                            @foreach ($pays as $pay)
                        <option value="{{$pay->id}}">{{$pay->nom}}</option>
                            @endforeach

                            @endif
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
                        <input type="text" class="form-control" name="prenom" placeholder="Prénom" id="prenom"  value="{{old('prenom')}}" required>
                        @error('prenom')
                        <span class="helper-text red-text">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="input-group w-100 form-group">
                        <label class="form-label" for="tel">Téléphone <strong class="text-danger">*</strong></label>
                        <input class="form-control" id="phone" name="tel" type="tel"  value="{{old('tel')}}" required width="100%">
                        @error('tel')
                        <span class="helper-text red-text">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="organisation">Localité <strong class="text-danger">*</strong></label>
                        <select name="localite_id" id="" class="form-control custom-select select2">
                            <option value="" selected disabled> Sélectionner</option>
                            @foreach ($localites as $localite)
                        <option value="{{$localite->id}}">{{$localite->nom}}</option>
                            @endforeach
                        </select>
                        @error('localite_id')
                        <span class="helper-text red-text">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    {{-- <div class="form-group @if (Auth::user()->role->designation == 'Chef d’Unité') d-none @endif">
                        <label class="form-label" for="nom">Fonction <strong class="text-danger">*</strong></label>
                        <input type="text" class="form-control" name="titre" placeholder="Fonction" id="titre"  value="{{old('titre')}}" required>
                        @error('titre')
                        <span class="helper-text red-text">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div> --}}

                    @if (Auth::user()->role->designation != 'Administrateur Général' && Auth::user()->role->designation != 'Coordonnateur Régional' )
                    <div class="form-group">
                        <label class="form-label" for="organisation">Unité <strong class="text-danger">*</strong></label>
                        <select name="unite_id" id="" class="form-control custom-select select2">
                            <option value="" selected disabled> Sélectionner</option>

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
                    <div class="form-group">
                        <label class="form-label" for="organisation">Role <strong class="text-danger">*</strong></label>
                        <select name="role_id" id="" class="form-control custom-select select2">
                            @if (Auth::user()->role->designation == 'Chef d’Unité' || Auth::user()->role->designation == 'Coordonnateur Régional' || Auth::user()->role->designation == 'Coordonnateur National')
                        <option value="{{$roles->id}}" selected> {{$roles->designation}}</option>
                            @else
                            <option value="" selected disabled> Sélectionner</option>
                            @foreach ($roles as $role)
                        <option value="{{$role->id}}">{{$role->designation}}</option>
                            @endforeach
                            @endif
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
                            <h3 class="mb-0 card-title">Photo de profil</h3>
                        </div>
                        <div class="card-body">
                            <input type="file" class="dropify" data-max-file-size="1M" name="profile_photo_path" accept=".png, .JPEG, ." />
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
        </span> Enregistrer</button>

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
    <script>
        function show_ville()
{
var select_status=$('#pays_id').val();

$.ajax({
headers: {
    'X-CSRF-Token': '{{ csrf_token() }}',
},
url: '/pays/ville/'+ escape(select_status),
type: 'get',
success: function(data){
    var villes = data;
    if (villes == undefined) {
        villes = 'Veuillez selectionner un pays'
    }
    console.log(villes);
    $("#ville_id").html('');
    $("#ville_id").append(
        '<option value="" selected disabled> Sélectionner</option>'

    );

    villes.forEach((element) => {
        $("#ville_id").append(
        '<option value="'+element.id+'">  '+element.nom+' </option>'
        );

    });
},
error:function(data){
console.log(data);

},
});

}


</script>
@stop
