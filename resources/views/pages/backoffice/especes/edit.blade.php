
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
						<h1 class="page-title">Liste des Espèces</h1>
						<ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('accueil')}}">Accueil</a></li>
							<li class="breadcrumb-item active" aria-current="page">Espèces</li>
						</ol>
					</div>
					<div class="ml-auto pageheader-btn">
                    <a class="btn btn-primary" href="{{route('especes.index')}}"  >  <span>
                            <i class="fe fe-list"></i>
                        </span>
                        Toutes les Espèces</a>
                    </button>

					</div>
				</div>
				<!-- PAGE-HEADER END -->
@endsection
@section('content')
@if ($errors->count()>0)
    @foreach ($errors as $error)
        <div class="alert alert-danger">
            {{ $error->message }}
        </div>
    @endforeach
@endif
<form action="{{route('especes.update',$espece->uuid)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="designation">Nom <strong class="text-danger">*</strong> </label>
                        <input type="text" class="form-control" name="nom" placeholder="Nom" id="nom"  value="{{$espece->nom}}" required>
                        @error('nom')
                        <span class="helper-text red-text">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                </div>



                <div class="col-md-6">

                        <div class="form-group">
                            <label class="form-label" for="nom_scientifique">Nom Scientifique <strong class="text-danger">*</strong> </label>
                            <input type="text" class="form-control" name="nom_scientifique" placeholder="Nom Scientifique" id="nom_scientifique"  value="{{$espece->nom_scientifique}}" required>
                            @error('nom_scientifique')
                            <span class="helper-text red-text">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="designation">Famille <strong class="text-danger">*</strong> </label>
                        <input type="text" class="form-control" name="famille" placeholder="famille" id="famille"  value="{{$espece->famille}}" required>
                        @error('famille')
                        <span class="helper-text red-text">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
					</div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="organisation">Type d'espèces <strong class="text-danger">*</strong></label>
                        <select name="type" id="type" class="form-control custom-select select2">
                            <option value="{{$espece->type}}" selected>{{ ucfirst($espece->type) }}</option>
                            <option value="espece animale">Espece Animale</option>
                            <option value="espece vegetale">Espece Végétale</option> 
                        </select>
                        @error('type')
                        <span class="helper-text red-text">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>


                </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label" for="organisation">Ordres <strong class="text-danger">*</strong></label>
                            <select name="ordre_id" id="ordre_id" class="form-control custom-select select2">
                                <option value="{{$espece->ordre->id}}" selected>{{ ucfirst($espece->ordre->nom) }}</option>
                                @foreach ($ordres as $ordre)
                                <option value={{ $ordre->id }}>{{ ucfirst($ordre->nom) }}</option>
                                @endforeach
                            </select>
                            @error('ordre_id')
                            <span class="helper-text red-text">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                </div>
                <div class="col-md-12">
                    <div class="card shadow">
                        <div class="card-header">
                            <h3 class="mb-0 card-title">Veuillez insérer une photo de l'espèce </h3>
                        </div>
                        <div class="card-body">
                            <input type="file" class="dropify" data-max-file-size="1M" name="photo" accept="" />
                            @error('photo')
                        <span class="helper-text red-text">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
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



