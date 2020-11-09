
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
						<h1 class="page-title">Liste des Unités</h1>
						<ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('accueil')}}">Accueil</a></li>
							<li class="breadcrumb-item active" aria-current="page">Modifier</li>
						</ol>
					</div>
					<div class="ml-auto pageheader-btn">
                    <a class="btn btn-primary" href="{{route('unites.index')}}"  >  <span>
                            <i class="fe fe-list"></i>
                        </span>
                        Les unités</a>
                    </button>

					</div>
				</div>
				<!-- PAGE-HEADER END -->
@endsection
@section('content')

<form action="{{route('unites.update',$unite->uuid)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="designation">Dénomination <strong class="text-danger">*</strong> </label>
                        <input type="text" class="form-control" name="designation" placeholder="Dénomination" id="designation"  value="{{$unite->designation}}" required>
                        @error('designation')
                        <span class="helper-text red-text">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
					</div>
					<div class="input-group w-100 form-group">
                        <label class="form-label" for="tel">Téléphone <strong class="text-danger">*</strong></label>
                        <input class="form-control" id="phone" name="tel" type="tel"  value="{{$unite->tel}}" required>
                        @error('tel')
                        <span class="helper-text red-text">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>



                    <div class="form-group" style="margin-top: 25px">
                        <label class="form-label" for="organisation">Pays <strong class="text-danger">*</strong></label>
                        <select name="pays_id" id="" class="form-control custom-select select2">
                        <option value="{{$unite->pays->id}}" selected> {{$unite->pays->nom}}</option>
                            @foreach ($pays as $pay)
                        <option value="{{$pay->id}}">{{$pay->nom}}</option>
                            @endforeach
                        </select>
                        @error('pays_id')
                        <span class="helper-text red-text">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <br>
					</div>
					<div class="form-group">
                        <label class="form-label" for="organisation">Ville <strong class="text-danger">*</strong></label>
                        <select name="ville_id" id="" class="form-control custom-select select2">
                        <option value="{{$unite->ville->id}}" selected> {{$unite->ville->nom}}</option>
                            @foreach ($villes as $ville)
                        <option value="{{$ville->id}}">{{$ville->nom}}</option>
                            @endforeach
                        </select>
                        @error('ville_id')
                        <span class="helper-text red-text">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="lat">Latitude <strong class="text-danger">*</strong> </label>
                        <input type="text" class="form-control" name="lat" placeholder="Latidude" id="lat"  value="{{$unite->lat}}" required>
                        @error('lat')
                        <span class="helper-text red-text">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
					</div>

                </div>
                <div class="col-md-6">
					<div class="form-group">
                        <label class="form-label" for="organisation">Type <strong class="text-danger">*</strong></label>
                        <select name="type_id" id="type_id" class="form-control custom-select select2">
                        <option value="{{$unite->type->id}}" selected disabled> {{$unite->type->nom}}</option>

                            @foreach ($types as $type)
                        <option value="{{$type->id}}">{{$type->nom}}</option>
                            @endforeach
                        </select>
                        @error('organisation')
                        <span class="helper-text red-text">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="adresse">Adresse complete<strong class="text-danger">*</strong></label>
                        <textarea class="form-control" rows="5" name="adresse" id="adresse"   required> {{$unite->adresse}}</textarea>
                        @error('adresse')
                        <span class="helper-text red-text">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
					</div>
					<div class="form-group">
                        <label class="form-label" for="organisation">Responsables <strong class="text-danger">*</strong></label>
                        <select name="responsable_id" id="" class="form-control custom-select select2">
                        <option value="{{$unite->responsable_id}}" selected>{{$unite->responsable->nom}}</option>

                            @foreach ($responsables as $responsable)
                        <option value="{{$responsable->id}}">{{$responsable->nom}}</option>
                            @endforeach
                        </select>
                        @error('responsable_id')
                        <span class="helper-text red-text">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="long">Longitude <strong class="text-danger">*</strong> </label>
                        <input type="text" class="form-control" name="long" placeholder="Longitude" id="long"  value="{{$unite->long}}" required>
                        @error('long')
                        <span class="helper-text red-text">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
					</div>
                </div>
                <div class="col-md-6 ">
                    <div class="card shadow">
                        <div class="card-header">
                            <h3 class="mb-0 card-title">Veuillez ajouter un logo</h3>
                        </div>
                        <div class="card-body">
                            <input type="file" class="dropify" data-max-file-size="1M" name="logo" accept="" />
                            @error('logo')
                        <span class="helper-text red-text">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        </div>
                    </div>
				</div>
				<div class="col-md-6 ">
                    <div class="card shadow">
                        <div class="card-header">
                            <h3 class="mb-0 card-title">Veuillez insérer une photo de couverture</h3>
                        </div>
                        <div class="card-body">
                            <input type="file" class="dropify" data-max-file-size="1M" name="photo_couverture" accept="" />
                            @error('photo_couverture')
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
@stop



