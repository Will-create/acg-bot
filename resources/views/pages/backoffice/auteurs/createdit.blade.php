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
                <li class="breadcrumb-item active" aria-current="page"> Nouvel auteur de crime </li>
                @else
                <li class="breadcrumb-item active" aria-current="page"> Mise à jour</li>

                @endif
            </ol>
        </div>
        <div class="ml-auto pageheader-btn">
            <a class="btn btn-primary" href="{{ route('crimes.show', $auteur->crime ? $auteur->crime->uuid : $crimeUuid) }}"> <span>
                    <i class="fe fe-list"></i>
                </span> Revenir au crime</a>
            </button>

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
