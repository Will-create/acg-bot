@extends('layouts.master4')
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
            <h1 class="page-title">Détails </h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('accueil') }}">Accueil</a></li>
                <li class="breadcrumb-item" aria-current="page"><a href="{{route('crimes.index')}}">Crimes</a></li>
                <li class="breadcrumb-item" aria-current="page"><a href="{{route('type_crimes.index')}}">Types de crime</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ ucfirst($type->nom) }}</li>
            </ol>
        </div>
        <div class="ml-auto pageheader-btn">
            <a class="btn btn-primary" href="{{ route('type_crimes.index') }}"> <span>
                    <i class="fe fe-list"></i>
                </span>
                Tous les types d'unité</a>
            </button>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
@endsection
@section('content')
    <!-- ROW-1 OPEN -->
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <div class="float-left">
                        <div class="media-heading">
                            <h5><strong> {{ ucfirst($type->nom) }}</strong></h5>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="card-body wideget-user-contact">
                    <strong>Description :</strong> {{ $type->description }}
                    <br><br>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="tab-pane active show" id="tab-52">
                <div class="card">
                    <div class="card-body">
                        <h3>Crimes associés à ce type</h3>

                    </div>
                </div>

            </div>

        </div>

    </div><!-- COL-END -->
    </div>
    <div class="row">
        <div class="col-md-6"></div>
        <div class="col-md-6 mb-4">
            <a href="{{ route('type_crimes.index') }}" class="btn btn-dark"> <span>
                    <i class="fe fe-close"></i>
                </span><i class="fa fa-times"></i> Retour</a>

            <a href="{{ route('type_crimes.edit', $type->uuid) }}" class="btn btn-primary">
                <i class="fa fa-edit"></i> Modifier</a>

            <button type="button" class="btn btn-danger  mb-1" data-toggle="modal"
                data-target="#exampleModalDelete{{ $type->id }}"><i class="fa fa-trash"></i> Supprimer </button>
        </div>
    </div>

    <div class="modal" id="exampleModalDelete{{ $type->id }}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalDelete" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalDelete">Suppression de {{ $type->nom }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p> Etes-vous sûr de bien vouloir supprimer ce type d'unité ?
                    </p>
                </div>
                <div class="modal-footer">
                    <form action="{{ route('type_crimes.destroy', $type->uuid) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger ">
                            <i class="fa fa-trash"></i>
                            <span>Confirmer</span>
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


@endsection
