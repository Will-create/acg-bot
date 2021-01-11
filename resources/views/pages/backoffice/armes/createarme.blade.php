
@extends('layouts.master4', ['titrePage' => $titrePage])
@section('css')
    <!-- INTERNAL SELECT2 CSS -->
    <link href="{{ URL::asset('assets/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ URL::asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" />

    <!-- INTERNAL  DATA TABLE CSS-->
    <link href="{{ URL::asset('assets/plugins/datatable/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/responsivebootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/fileexport/buttons.bootstrap4.min.css') }}" rel="stylesheet" />

    <!-- INTERNAL PRISM CSS -->
    <link href="{{ URL::asset('assets/plugins/prism/prism.css') }}" rel="stylesheet">
    <!-- INTERNAL TELEPHONE CSS-->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/telephoneinput/telephoneinput.css') }}">
@endsection
@section('page-header')
    <!-- PAGE-HEADER -->
    @include('partials._notification')
    <div class="page-header">
        <div>
            <h1 class="page-title"> {!! $titrePage !!} </h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('accueil') }}">Accueil</a></li>
                <li class="breadcrumb-item active" aria-current="page"> Nouvelle arme </li>
                
            </ol>
        </div>
        <div class="ml-auto pageheader-btn">
            <a class="btn btn-primary" href="{{ route('armes.index') }}"> <span>
                    <i class="fe fe-list"></i>
                </span> Toutes les armes</a>
            </button>

        </div>
    </div>
    <!-- PAGE-HEADER END -->
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('armes.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                        
                            <div class="form-group">
                                <label class="form-label" for="libelle">Libéllé <strong class="text-danger">*</strong> </label>
                                <input type="text" class="form-control" name="libelle" placeholder="Libellé" id="libelle"  value="{{old('libelle') ?? $arme->libelle }}" required>
                                @error('libelle')
                                <span class="helper-text red-text">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            
                                
                        
                            <div class="form-group">
                                <div class="form-group">
                                    <label class="form-label" for="reference">Réference <strong class="text-danger">*</strong></label>
                                    <input class="form-control"  name="reference" placeholder="Réference" type="text"  value="{{old('reference') ?? $arme->reference}}" required>
                                    @error('reference')
                                    <span class="helper-text red-text">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <input type="hidden" name="crime_id" value="{{$crime->id}}">
                                <input type="hidden" name="crime" value="{{$crime->uuid}}">
                            </div>
                               
                            </div>
                            
                                <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="remarques">Remarques <strong
                                    class="text-danger">*</strong>
                                        </label>
                                        <textarea rows="5" type="text" class="form-control" name="remarques"
                                            placeholder="Remarques" id="remarques"
                                            required>{{ old('remarques') ?? $arme->remarques }}</textarea>
                                                @error('remarques')
                                            <span class="helper-text red-text">
                                                <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            </div>
                                </div>
                        
                            </div>
                            <div class="row">
                                <div class="card shadow">
                                    <div class="card-header">
                                        <h3 class="mb-0 card-title">Photo de l'arme <strong class="text-danger">*</strong></h3>
                                    </div>
                                    <div class="card-body">
                                        <input type="file" class="dropify" id="photo" data-max-file-size="1M" name="photo" accept="image/*"/>
                                        @error('photo')
                                    <span class="helper-text red-text">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    </div>
                                </div>
                            </div>
                </div>
                <input type="hidden" name="fromcrime" value="{{ $crime->uuid }}">
                <div class="modal-footer">
                    <a href="{{ route('crimes.show',$crime->uuid) }}" class="btn btn-dark"> <i class="fa fa-times"
                            aria-hidden="true"></i>
                        Annuler </a>
                    <button type="submit" class="btn btn-primary"><span>
                            <i class="fe fe-save"></i>
                        </span> {{ $btnAction }}</button>
                </div>
                </div>
                
                
            </form>
        </div>
    </div>
@stop
@section('js')
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/file-upload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/jquery.dataTables.min.js') }}"></script>
    <!-- INTERNALPRISM JS -->
    <script src="{{ URL::asset('assets/plugins/prism/prism.js') }}"></script>
    <!-- INTERNAL TELEPHONE JS -->
    <script src="{{ URL::asset('assets/plugins/telephoneinput/telephoneinput.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/telephoneinput/inttelephoneinput.js') }}"></script>
@stop
