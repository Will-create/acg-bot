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
                <li class="breadcrumb-item"><a href="{{ route('crime_auteurs.index') }}">Auteurs de crime</a></li>
                @if(Route::currentRouteName() == 'crime_auteurs.create')
                <li class="breadcrumb-item active" aria-current="page"> {{$titrePage}}</li>
                @else
                <li class="breadcrumb-item active" aria-current="page">{{$titrePage}}</li>

                @endif
            </ol>
        </div>
        <div class="ml-auto pageheader-btn">
            <a class="btn btn-primary" href="{{ route('crimes.show', $auteur->crime ? $auteur->crime->uuid : $crimeUuid) }}"> <span>
                    <i class="fe fe-list"></i>
                </span> Revenir au crime</a>
 
        </div>
    </div>
    <!-- PAGE-HEADER END -->
@endsection
@section('content')

    @if (Route::currentRouteName() == 'crime_auteurs.create')
        <form action="{{ route('crime_auteurs.store') }}" method="post" enctype="multipart/form-data">
        @else
            <form action="{{ route('crime_auteurs.update', $auteur->uuid) }}" method="post" enctype="multipart/form-data">
                @method('PUT')
    @endif
    @csrf
    @include('pages.backoffice.auteurs._form', ['btnAction' => $btnAction, 'auteur' => $auteur])
    </form>

        @if ((Route::currentRouteName() == 'crime_auteurs.show'))
        <div class="text-right">
            <button type="button" class="btn btn-outline-danger  mb-1" data-toggle="modal" data-target="#exampleModalDelete{{$auteur->id}}"><i class="fa fa-trash"></i> Supprimer</button>
        </div>
        <div class="modal" id="exampleModalDelete{{$auteur->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalDelete" aria-hidden="true">
            <div class="modal-dialog text-right" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalDelete">Suppression de l'auteur  <span class="text-success"> {{$auteur->nom. ' '. $auteur->prenom}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>  Voullez-vous supprimer cet auteur ?
                        </p>
                    </div>
                    <div class="modal-footer text-right">
                        <form action="{{route('crime_auteurs.destroy', $auteur)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger ">
                                <i class="fa fa-trash"></i>
                            <span>Confirmer la suppression</span>
                            </button>
                            <button type="reset" class="btn btn-success" data-dismiss="modal">
                                <i class="fa fa-times"></i>
                                            <span>Annuler</span>
                            </button>
                            </form>
                    </div>
                </div>
            </div>
        </div>
        @endif
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
